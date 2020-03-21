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
        $categories = Category::whereNull('category_id')->get();
        $fastFoods = $categories->where('name', 'Đồ uống và đồ ăn nhanh')->first();
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
        $product = Product::findOrFail($id);
        $product->update(['views' => $product->views + ONE ]);
        $data = [
            'product' => $product
        ];
        return view('home.detail', $data);
    }

    public function heart($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['likes' => $product->likes + ONE ]);
        return redirect()->back();
    }
}
