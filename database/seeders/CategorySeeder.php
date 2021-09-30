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
            'name'=>'MEDICAMENTOS DE VENTA LIBRE',
            'description' => 'Medicamentos que se pueden vender a todo el publico',
            'image'=>'https://dummyimage.com/600x400/000/fff'
        ]);
        Category::create([
            'name'=>'MEDICAMENTOS CONTROLADOS',
            'description' => 'Medicamentos que se pueden vender solo con receta medica',
            'image'=>'https://dummyimage.com/600x400/000/fff'
        ]);
        Category::create([
            'name'=>'EQUIPO MEDICO',
            'description' => 'Venta de insumos medicos',
            'image'=>'https://dummyimage.com/600x400/000/fff'
        ]);
        Category::create([
            'name'=>'TIENDA DE CONVENIENCIA',
            'description'=>'Venta de productos de miselaneos',
            'image'=>'https://dummyimage.com/600x400/000/fff'
        ]);
    }
}
