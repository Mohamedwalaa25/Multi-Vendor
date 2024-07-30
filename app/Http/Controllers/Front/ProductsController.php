<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
//        $products = Product::active()->latest()->paginate(9);
        return view('front.allproducts');
    }

    public function show(Product $product)
    {
        if($product->status !="active"){
            abort(404);
        }
        return view('front.products.show' , compact('product'));

    }
}
