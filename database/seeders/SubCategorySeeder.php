<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
            'name'=>'PVC',
            'description' => 'materiales hechos de pvc de diferentes medidas',
            'category_id'=>1
        ]);
        SubCategory::create([
            'name'=>'Hierro',
            'description' => 'Venta de hierro para construccion',
            'category_id'=>2
        ]);
        SubCategory::create([
            'name'=>'Hierbicidas',
            'description' => 'venta de hierbicidas para el cuidado de los cultivos ',
            'category_id'=>3
        ]);
        SubCategory::create([
            'name'=>'Herramientas del hogar',
            'description' => 'Venta de herramientas varias',
            'category_id'=>4
        ]);
    }
}
