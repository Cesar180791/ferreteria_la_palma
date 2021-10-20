<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'barCode',
        'cost',
        'price',
        'presentation_id',
        'sub_category_id'
    ];

     public function subCategory(){
        return $this->belongsTo(SubCategory::class); 
    }

    public function presentation(){
        return $this->belongsTo(Presentation::class); 
    }
}