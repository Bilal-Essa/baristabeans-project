<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\Product; // Zorg ervoor dat je de Product model importeer

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $r)
    {
        
        $products = Product::all();

        // Roep de setMessage methode aan om een bericht in te stellen
        $message = $this->setMessage();

        // Geef de producten en het bericht door aan de view 'Shop'
        return view('Shop', ['products' => $products, 'message' => $message]);
    }

    // Een methode om het welkomstbericht in te stellen
    public function setMessage()
    {
        // Stel het welkomstbericht in
        $message = "Welkom bij onze winkel! Hier kan je onze producten vinden.";
        return $message;
    }
}
