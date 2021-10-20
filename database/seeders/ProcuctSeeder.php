<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProcuctSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=>'Viro-Grip',
            'barCode' =>'1457851225',
            'cost' => 0.25,
            'price'=>0.45,
            'presentation_id'=>1,
            'sub_category_id'=>1
        ]);
        Product::create([
            'name'=>'Vitamina C',
            'barCode' =>'1457851225',
            'cost' => 0.25,
            'price'=>0.45,
            'presentation_id'=>2,
            'sub_category_id'=>3
        ]);
        Product::create([
            'name'=>'Vermagest',
            'barCode' =>'1457851225',
            'cost' => 0.25,
            'price'=>0.45,
            'presentation_id'=>3,
            'sub_category_id'=>2
        ]);
        Product::create([
            'name'=>'CLABULIN',
            'barCode' =>'1457851225',
            'cost' => 0.25,
            'price'=>0.45,
            'presentation_id'=>4,
            'sub_category_id'=>4
        ]);
    }
}
