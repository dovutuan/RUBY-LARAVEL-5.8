<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\RateRequest;
use App\Models\Category;
use App\Models\OptionProduct;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Species;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $allCategories = Category::loadAllCategories();
        $fastFoods = Category::fastFoodAndDrink();
        $productOfFastFoods = Product::
        whereHas('categories', function ($qr) use ($fastFoods) {
            $qr->where('category_id', $fastFoods->id);
        })->take(EIGHT)->get();
        $data = [
            'allCategories' => $allCategories,
            'productOfFastFoods' => $productOfFastFoods,

        ];
        return view('home.index', $data);
    }

    public function detailProduct($id)
    {
        $allCategories = Category::loadAllCategories();
        $product = Product::findOrFail($id);
        $rates = $product->rate->take(EIGHT);
        $total_rate = $rates->count();
        $point = round($product->rate->avg('star'));
        $product_category = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->inRandomOrder()->take(EIGHT)->get();
        $product->update(['views' => $product->views + ONE]);
        $data = [
            'allCategories' => $allCategories,
            'product' => $product,
            'product_category' => $product_category,
            'point' => $point,
            'rates' => $rates,
            'total_rate' => $total_rate,
        ];
        return view('home.detail', $data);
    }

    public function heart($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['likes' => $product->likes + ONE]);
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $format_min_price = str_replace(',', '', $min_price);
        $format_max_price = str_replace(',', '', $max_price);
        $category_id = $request->input('category_id');
        $supplier_id = $request->input('supplier_id');
        $specie_id = $request->input('specie_id');
        $allCategories = Category::loadAllCategories();
        $species = Species::all();
        $suppliers = Supplier::all();
        $productNews = Product::take(EIGHT)->latest()->get();
        $short = $request->input('short') ? $request->input('short') : null;
        $name = $request->input('name');
        $products = Product::searchHome($name, $category_id, $supplier_id, $specie_id, $format_min_price, $format_max_price, $short);
        $data = [
            'short' => $short,
            'name' => $name,
            'category_id' => $category_id,
            'supplier_id' => $supplier_id,
            'specie_id' => $specie_id,
            'allCategories' => $allCategories,
            'species' => $species,
            'suppliers' => $suppliers,
            'counts' => $products->count(),
            'products' => $products,
            'productNews' => $productNews,
            'min_price' => $min_price,
            'max_price' => $max_price,
        ];
        return view('home.search', $data);
    }

    public function reviewProduct(RateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::findOrFail($id);
            Rate::create([
                'product_id' => $product->id,
                'user_id' => Auth::user()->id,
                'star' => $request->input('star'),
                'content' => $request->input('content'),
            ]);
            DB::commit();
            return back()->with('success', __('messages.rate-successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function contact()
    {
        $allCategories = Category::loadAllCategories();
        $user = Auth::user();
        $data = [
            'allCategories' => $allCategories,
            'user' => $user,
        ];
        return view('home.contact', $data);
    }
}
