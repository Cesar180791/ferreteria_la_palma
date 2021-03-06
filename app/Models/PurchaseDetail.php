<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable =[
        'purchases_id',
        'product_id',
        'cost',
        'IVACost',
        'costIVA',
        'price',
        'IVAprice',
        'priceIVA',
        'quantity',
        'totalPurchase'
    ];
}
