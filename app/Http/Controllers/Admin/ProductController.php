<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\OptionProduct;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Species;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list|product-edit', ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $key = $request->input('key');
            $categories = Category::whereNotNull('category_id')->get();
            $species = Species::all();
            $suppliers = Supplier::all();
            $products = Product::search($key);
            $totalProduct = $products->count();
            $data = [
                'products' => $products,
                'categories' => $categories,
                'species' => $species,
                'suppliers' => $suppliers,
                'totalProduct' => $totalProduct,
                'key' => $key,
            ];

            return view('admin.product.index', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $name_image = $this->upLoadImage($request->file('image_product'));
            $product = Product::create([
                'name' => $request->input('name'),
                'slug' => str_slug($request->input('name')),
                'content' => $request->input('content'),
                'detail' => $request->input('detail'),
                'status' => $request->input('status'),
                'category_id' => $request->input('category_id'),
                'image' => $name_image,
                'created_by' => Auth::user()->id,
            ]);
            if ($product) {
//                $listImage = [];
//                foreach ($request->input('image') as $image) {
//                    $listImage[] = [
//                        'product_id' => $product->id,
//                        'image' => $image,
//                    ];
//                }
//                ImageProduct::insert($listImage);

                if ($request->input('sale')) {
                    Sale::insert([
                        'product_id' => $product->id,
                        'sale' => $request->input('sale'),
                        'start' => $request->input('start'),
                        'finish' => $request->input('finish'),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }

                $listOptionProduct = [];
                $price = $request->input('price');
                $amount = $request->input('amount');
                foreach ($request->input('specie_id') as $key => $specie_id) {
                    $listOptionProduct[] = [
                        'product_id' => $product->id,
                        'supplier_id' => $request->input('supplier_id'),
                        'price' => $price[$key],
                        'amount' => $amount[$key],
                        'species_id' => $specie_id,
                    ];
                }
                OptionProduct::insert($listOptionProduct);
            }
            DB::commit();
            return redirect()->back()->with('success', __('messages.create-successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        if ($product->created_by != Auth::user()->id) {
            return redirect()->back()->with('error', __('messages.error'));
        }
        $data = [
            'product' => $product,
        ];
        return view('admin.product.show', $data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function upLoadImage($image)
    {
        $name_image = null;
        if ($image) {
            $name_image = uploadImage(PRODUCTS, $image);
        }
        return $name_image;
    }
}
