<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:home', ['only' => ['index']]);
    }

    public function index()
    {
        return view('layouts_home.app');
    }
}
