<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\OptionProduct;
use App\Models\Product;
use App\Models\Species;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
//    function __construct()
////    {
////        $this->middleware('permission:home', ['only' => ['index']]);
////    }

    public function index()
    {
        $categories = Category::loadCategories();
        $allCategories = Category::loadAllCategories();
        $fastFoods = $categories->where('name', 'Đồ ăn và đồ uống nhanh')->first();
        $productOfFastFoods = Product::
        whereHas('categories', function ($qr) use ($fastFoods) {
            $qr->where('category_id', $fastFoods->id);
        })->take(EIGHT)->get();
        $data = [
            'categories' => $categories,
            'allCategories' => $allCategories,
            'productOfFastFoods' => $productOfFastFoods,

        ];
        return view('home.index', $data);
    }

    public function detailProduct($id)
    {
        $categories = Category::loadCategories();
        $allCategories = Category::loadAllCategories();
        $product = Product::findOrFail($id);
        $product->update(['views' => $product->views + ONE]);
        $data = [
            'categories' => $categories,
            'allCategories' => $allCategories,
            'product' => $product
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
        $categories = Category::loadCategories();
        $allCategories = Category::loadAllCategories();
        $species = Species::all();
        $suppliers = Supplier::all();
        $productNews = Product::take(EIGHT)->latest()->get();
        $short = $request->input('short') ? $request->input('short') : null;
        $name = $request->input('name');
        $products = Product::
        when($name, function ($qr) use ($name) {
            $qr->where('name', 'like', "%$name%");
        })
            ->latest($short)
            ->paginate(TWELVE);
        $data = [
            'categories' => $categories,
            'allCategories' => $allCategories,
            'species' => $species,
            'suppliers' => $suppliers,
            'counts' => $products->count(),
            'products' => $products,
            'productNews' => $productNews
        ];
        return view('home.search', $data);
    }
}
