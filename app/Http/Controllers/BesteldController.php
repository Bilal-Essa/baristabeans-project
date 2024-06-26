<?php

namespace App\Http\Controllers;
use App\Models\SaleOrderItem;
use App\Models\SaleOrder;
use Illuminate\Http\Request;

class BesteldController extends Controller
{
    public function index()
   {
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
      foreach ($saleOrderItems as $saleOrderItem) {
         $totaalbedrag = $totaalbedrag + $saleOrderItem->price;
      }
   //  $_SESSION['order_id'] = null;
   $templateData = [
      'ordernummer' => $order_id, // Het ordernummer wordt toegevoegd aan de template data
      'order' => $saleorder, // De bestelling zelf wordt toegevoegd aan de template data
      'order_items' => $saleOrderItems, // De bestelde items worden toegevoegd aan de template data
      'totaal_bedrag' => $totaalbedrag // Het totaalbedrag van de bestelling wordt toegevoegd aan de template data
  ];
  
      return view("besteld", $templateData);
   }
}
