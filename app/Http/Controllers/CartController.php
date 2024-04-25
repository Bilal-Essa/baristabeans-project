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
            $saleorder->email = 'Bilal@hotmail.com';
            $saleorder->save();
            // echo "Order aanmaken {$saleorder->id} c {$order_id} <br>";
            //hier slaan we de order id op in de session voor later gebruik.
            $_SESSION['order_id'] = $saleorder->id;
        } else {
            //de oder bestond al de we gebruiken de bestaande order vanuit de database
            $saleorder = SaleOrder::where('id', $order_id)->first();
        }
        $product = $request->post();

        $productDb = Product::where('product_id', $product['artikel'])->first();

        if ($product['gewicht'] == 250) {

            $prijs = $productDb->Product_price;
        } else {
            $prijs = $productDb->productkilo_price;
        }
        print_r($productDb->Product_name);


        $saleorderitem = new SaleOrderItem();
        $saleorderitem->sale_order_id = $saleorder->id;
        $saleorderitem->quantity = $product['gewicht'];
        $saleorderitem->product_id = $product['artikel'];
        $saleorderitem->price = $prijs;
        $saleorderitem->description = $productDb->Product_name;


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
