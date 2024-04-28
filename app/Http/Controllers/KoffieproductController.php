<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaleOrderItem;
use Illuminate\Http\Request;

class KoffieproductController extends Controller
{
    public function index(Request $r){

        $id = $r->get('product_id'); // Haal de product-ID op uit de request

        $product = Product::where('product_id', $id)->first(); // Zoek het product op basis van de ID

        return view('koffieproduct', ['product' => $product]); // Geef het gevonden product door aan de view 'koffieproduct'
    }
}
