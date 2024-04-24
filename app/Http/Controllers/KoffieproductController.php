<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaleOrderItem;
use Illuminate\Http\Request;

class KoffieproductController extends Controller
{
    public function index(Request $r){

        // $order_id = $request->session()->get('order_id');
        // if(!$order_id)
        // {
        //         // select from sale_order_items where sale_order_id = $order_id
        //         SaleOrderItem::where)()
        // }

        

        $id = $r->get('product_id');

        $product = Product::where('product_id', $id)->first();
        

        return view('koffieproduct', ['product' => $product]);
    }

}