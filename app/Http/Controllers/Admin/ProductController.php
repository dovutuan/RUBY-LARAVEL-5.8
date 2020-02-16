<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\Size;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function index()
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        $suppliers = Supplier::all();
        $products = Product::all();
        $totalProduct = $products->count();
        $data = [
            'products' => $products,
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'suppliers' => $suppliers,
            'totalProduct' => $totalProduct,
        ];

        return view('admin.product.index', $data);
    }

    public function store(ProductRequest $request)
    {
        dd($request->all());
        $product = Product::create([
            'name' => $request->input('name'),
            'slug' => str_slug($request->input('name')),
            'content' => $request->input('content'),
            'detail' => $request->input('detail'),
            'status' => $request->input('status'),
            'category_id' => $request->input('category_id'),
        ]);
        if ($product) {
            $listImage = [];
            foreach ($request->input('image') as $item) {
                $listImage[] = [
                    'product_id' => $product->id,
                    'image' => $item,
                ];
            }
            ImageProduct::insert($listImage);
        }
    }

    public function show($id)
    {
        //
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
}
