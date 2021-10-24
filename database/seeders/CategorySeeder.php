<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Fontaneria',
            'description' => 'venta de productos para fontaneria',
            'image'=>'https://dummyimage.com/600x400/000/fff'
        ]);
        Category::create([
            'name'=>'Construccion',
            'description' => 'Materiales diversos para construccion',
            'image'=>'https://dummyimage.com/600x400/000/fff'
        ]);
        Category::create([
            'name'=>'Agronomia',
            'description' => 'Venta de hierbicidas y productos pra el cuidado de las cosechas',
            'image'=>'https://dummyimage.com/600x400/000/fff'
        ]);
        Category::create([
            'name'=>'Herramientas',
            'description'=>'Venta de productos de miselaneos',
            'image'=>'https://dummyimage.com/600x400/000/fff'
        ]);
    }
}
