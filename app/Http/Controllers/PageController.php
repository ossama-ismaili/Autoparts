<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function index(){
        $products=Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.index')->with('products',$products);
    }

    public function about()
    {
        return view('pages.about');
    }
}
