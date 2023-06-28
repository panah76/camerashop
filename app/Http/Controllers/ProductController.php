<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {


        $products = "product list from ProductController";
        return view('products.index',['products' => $products]);
    }
}
