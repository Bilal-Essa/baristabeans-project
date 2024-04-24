<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\Product; // Zorg ervoor dat je de Product model importeer

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $r)
    {
        
        $id = $r->get('product_id');
        echo $id;
      

        // Haal alle producten op uit de database
        $products = Product::all();

        // Roep de setMessage functie aan om een bericht in te stellen
        $message = $this->setMessage();

        // Geef de producten en het bericht door naar de view 'welcome'
        return view('welcome', ['products' => $products, 'message' => $message]);
        

    }

    public function setMessage()
    {
        // Hier kun je logica toevoegen om het bericht dynamisch in te stellen
        $message = "Welkom bij onze winkel! Hier zijn onder kan je onze producten vinden";
        return $message;
    }

}
