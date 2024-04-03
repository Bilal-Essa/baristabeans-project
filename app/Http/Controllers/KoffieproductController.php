<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class KoffieproductController extends Controller
{
    public function index(Request $r){

        $id = $r->get('product_id');

        $product = Product::where('product_id', $id)->first();
        

        return view('koffieproduct', ['product' => $product]);
    }
}
