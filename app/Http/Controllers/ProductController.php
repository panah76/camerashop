<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function search($id)
    {
        $product = product::where('id'.$id)->get();
        return response()->json($product);

}
}
