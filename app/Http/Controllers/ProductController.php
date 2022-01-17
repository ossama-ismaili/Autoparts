<?php

namespace App\Http\Controllers;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::orderBy('created_at','desc')->paginate(6);
        return view('pages.products')->with('products',$products);
    }

    public function show($id)
    {
        $product=Product::find($id);
        if(isset($product)){
            return view('pages.product')->with('product',$product);
        }
        else{
            abort(404);
        }
    }

    public function category($id)
    {
        $products=Product::where("category_id",$id)->paginate(6);;
        if(count($products) > 0){
            return view('pages.products')->with('products',$products);
        }
        else{
            abort(404);
        }
    }

    public function search($keyword)
    {
        $products=Product::where('title', 'like', '%'.$keyword.'%')->paginate(6);
        return view('pages.products')->with('products',$products);
    }
}
