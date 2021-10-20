<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name',
        'description',
        'image'
    ];

    public function subCategories(){
        return $this->hasMany(SubCategory::class); 
    }

    /*Accesor para recuperar la imagen, y poner una por defecto*/
    public function getImagenAttribute($image){
        if ($this->image == null)
            return 'noimg.png';
        if (file_exists('storage/categorias/'.$this->image)) 
               return $this->image;
        else
            return 'noimg.png';
    }
}
