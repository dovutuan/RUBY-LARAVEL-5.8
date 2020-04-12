<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\OptionProduct;
use App\Models\Product;
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
        $fastFoods = $categories->where('name', 'Đồ ăn và đồ uống nhanh')->first();
        $productOfFastFoods = Product::
        whereHas('categories', function ($qr) use ($fastFoods) {
            $qr->where('category_id', $fastFoods->id);
        })->take(EIGHT)->get();
        $data = [
            'categories' => $categories,
            'productOfFastFoods' => $productOfFastFoods,

        ];

        return view('home.index', $data);
    }

    public function detailProduct($id)
    {
        $categories = Category::loadCategories();
        $product = Product::findOrFail($id);
        $product->update(['views' => $product->views + ONE]);
        $data = [
            'categories' => $categories,
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
        $short  = $request->input('short') ? $request->input('short') : null;
        $name = $request->input('name');
        $products = Product::
        when($name, function ($qr) use ($name) {
            $qr->where('name', 'like', "%$name%");
        })
            ->latest($short)
            ->simplePaginate(1);
        $data = [
            'categories' => $categories,
            'counts' => $products->count(),
            'products' => $products,
        ];
        return view('home.search', $data);
    }
}
