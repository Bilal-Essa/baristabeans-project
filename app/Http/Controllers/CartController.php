<?php

namespace App\Http\Controllers;

use App\Models\SaleOrder;
use App\Models\Product;
use App\Models\SaleOrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        //hier kijken we of session id bestaat met de coalescing operator
        $order_id = $_SESSION['order_id'] ?? null;

        if ($order_id === null) {
            //hier maken we een lege order aan
            $saleorder = new SaleOrder();
            $saleorder->name = '';
            $saleorder->email = '';
            $saleorder->save();

            //hier slaan we de order id op in de session voor later gebruik.
            $_SESSION['order_id'] = $saleorder->id;
        } else {
            //de oder bestond al de we gebruiken de bestaande order vanuit de database
            $saleorder = SaleOrder::where('id', $order_id)->first();
        }
        $product = $request->post();

        $productDb = Product::where('product_id', $product['artikel'])->first();



        $saleorderitem = SaleOrderItem
                        ::where('product_id', $product['artikel'])
                        ->where('sale_order_id', $saleorder->id)
                        ->first();
      
        var_dump($saleorderitem);

        if($saleorderitem)
        {
            $saleorderitem->quantity =  $saleorderitem->quantity  + $product['gewicht'];

            if ($saleorderitem->quantity <= 250) 
            {
                $tmpPrijs = $productDb->Product_price;
                $gramprijs = $tmpPrijs / 250;
                $prijs = $gramprijs *  $saleorderitem->quantity;
            } 
            else 
            {
                $tmpPrijs = $productDb->productkilo_price;
                $gramprijs = $tmpPrijs / 1000;
                $prijs = $gramprijs *  $saleorderitem->quantity;
            }
            $saleorderitem->price =  $prijs;

    
        }
        else 
        {
            // Nieuw product aan de bestelling toevoegen

            if ($product['gewicht'] == 250) {

                $prijs = $productDb->Product_price;
            } else {
                $prijs = $productDb->productkilo_price;
            }

            $saleorderitem = new SaleOrderItem();
            $saleorderitem->sale_order_id = $saleorder->id;
            $saleorderitem->quantity = $product['gewicht'];
            $saleorderitem->product_id = $product['artikel'];
            $saleorderitem->price = $prijs;
            $saleorderitem->description = $productDb->Product_name;
        }


        $saleorderitem->save();
        // redirect gebruiker terug naar product pagina
        return redirect('/winkelmand');
    }

    public function update(Request $request)
    {
        print_r($request->post());

        exit();
    }
    public function delete(Request $request)
    {
        $order_item_id = $request->get('order_item_id');
        // SaleOrderItem::getOne(); 
        $orderItemId = SaleOrderItem::where('id', $order_item_id)->first();
        $orderItemId->delete();

        // print_r($request->get('order_item_id'));
       return redirect('/winkelmand');


        exit();
    }
}
