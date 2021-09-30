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
            'name'=>'Antigripales',
            'description' => 'Medicamentos para la Gripe que se pueden vender a todo el publico',
            'category_id'=>1
        ]);
        SubCategory::create([
            'name'=>'Anticonceptivos',
            'description' => 'Medicamentos para palinificacion que se pueden vender a todo el publico',
            'category_id'=>1
        ]);
        SubCategory::create([
            'name'=>'Vitaminico',
            'description' => 'Medicamentos para fortalecer el sistema inmunologico que se pueden vender a todo el publico',
            'category_id'=>1
        ]);
        SubCategory::create([
            'name'=>'Antibioticos',
            'description' => 'Medicamentos para la infecciones que se pueden vender solo con receta',
            'category_id'=>2
        ]);
        SubCategory::create([
            'name'=>'Calmantes',
            'description' => 'Medicamentos para los Nervios que se pueden vender solo con receta',
            'category_id'=>2
        ]);
        SubCategory::create([
            'name'=>'Anestecios',
            'description' => 'Medicamentos para el dolor que se pueden vender solo con receta',
            'category_id'=>2
        ]);
        SubCategory::create([
            'name'=>'Equipo de Proteccion Virica',
            'description' => 'equipo para la prevencion de enfermedades viricas',
            'category_id'=>3
        ]);
        SubCategory::create([
            'name'=>'Bebidas Carbonatadas',
            'description' => 'Bebidas Carbonatadas para calmar la sed',
            'category_id'=>4
        ]);
    }
}
