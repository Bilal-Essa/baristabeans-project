<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\Product; // Zorg ervoor dat je de Product model importeer

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $r)
    {


    //    exit;
        $products = Product::all();


        $message = $this->setMessage();

        return view('Shop', ['products' => $products, 'message' => $message]);
        

    }

    public function setMessage()
    {
    
        $message = "Welkom bij onze winkel! Hier zijn onder kan je onze producten vinden";
        return $message;
    }


}
