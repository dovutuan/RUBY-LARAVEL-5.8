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
        $categories = Category::whereNull('category_id')->with('childrenCategories')->get();

        $products = OptionProduct::latest('pay')->limit(8)->get();
        $id = [];
        {
            foreach ($products as $product)
            {
                $id[]=[Product::where('id', $product->product_id)->get()];
            }
        }
        foreach ($id as $item) {
            foreach ($item as $i)
            {
                foreach ($i as $a)
                {
                    foreach ($a->optionProducts as $ize)
                    {
                        dd($ize->size->name);
                    }
                    dd($a->optionProducts);
                }
            }
       }
        foreach ($products as $product)
        {
            foreach ($product->optionProducts as $i)
            {
                dd($i);
            }
        }
        $products = $products->optionProducts->latest('pay')->limit(8)->get();
        foreach ($products as $product)
        {
            dd($product);
        }

        $data = [
            'categories' => $categories,

        ];
        return view('home.index', $data);
    }
}
