<?php

namespace App\Http\Controllers;

use App\Models\SaleOrderItem;
use App\Models\SaleOrder;
use Illuminate\Http\Request;

class WinkelmandController extends Controller
{
    public function index(){
     //hier kijken we of session id bestaat met de coalescing operator
        $order_id = $_SESSION['order_id'] ?? null;

         if ($order_id === null) {
            // hier is hij leeg
            return view("winkelmand-leeg");
         }
         //hier halen we alle producten op die bij de bestelling horen
         $saleOrderItems = SaleOrderItem::where("sale_order_id", $order_id)->get();
         //hier halen we de bestelling zelf op
         $saleorder = SaleOrder::where('id', $order_id)->first();

         $totaalbedrag = 0;
         //hier maken we een nieuwe array aan om het aan de view te geven
         foreach($saleOrderItems as $saleOrderItem)
         {
            $totaalbedrag = $totaalbedrag + $saleOrderItem->price;
            
         }
       
         $templateData = [
            'order' => $saleorder,
            'order_items' => $saleOrderItems,
            'totaal_bedrag'=> $totaalbedrag
         ];
         return view("winkelmand", $templateData);

    
}
}