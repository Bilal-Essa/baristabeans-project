<?php

namespace App\Http\Controllers;

use App\Models\SaleOrder;
use App\Models\Product;
use App\Models\SaleOrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add (Request $request){

        $order_id = $request->session()->get('order_id');
        if(!$order_id)
        {
            $saleorder = new SaleOrder();
            $saleorder->name = 'jessie';
            $saleorder->email = 'Bilal@hotmail.com';
            $saleorder->save();
            $request->session()->put('order_id', $saleorder->id);
        }

        $product = $request->post();
        
        $productDb = Product::where('product_id', $product['artikel'])->first();

        echo $order_id;

        echo "<h1>gepost product</h1>";
        print_r($product);



        if($product['gewicht'] == 250)
        {
           
            $prijs = $productDb->Product_price;
        }
        else
        {
            $prijs = $productDb->productkilo_price;
        }
        print_r($productDb->Product_name);
echo "prijs is $prijs";

        $saleorderitem = new SaleOrderItem();
        $saleorderitem->sale_order_id=$saleorder->id;
        $saleorderitem->quantity = $product['gewicht'];
        $saleorderitem->product_id = $product['artikel'];
        $saleorderitem->price = $prijs;
        $saleorderitem->description = $productDb->Product_name;


        $saleorderitem->save();
// redirect gebruiker terug naar product pagina
        exit();
    }

    public function update (Request $request){
        print_r($request->post());
        
        exit();
    }
    public function delete (Request $request){
        print_r($request->post());
        
        exit();
    }
} 