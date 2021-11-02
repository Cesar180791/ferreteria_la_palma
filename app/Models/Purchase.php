<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable =[
        'total',
        'item',
        'factura',
        'users_id',
        'proveedores_id'

    ];
}
