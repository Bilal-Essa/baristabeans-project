<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_id', 'product_name', 'product_afkomst','Product_price','product'  // Voeg hier de velden toe die je in de database hebt
    ];
}
