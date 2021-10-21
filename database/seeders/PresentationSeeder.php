<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presentation;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentation::create([
            'name'=>'Ampolla',
            'description'=>'bebible 30ml'
        ]);
        Presentation::create([
            'name'=>'Pastilla 500 MG',
            'description'=>'pastilla 500mg'
        ]);
        Presentation::create([
            'name'=>'pastilla 100 MG',
            'description'=>'pastilla de 100mg'
        ]);
         Presentation::create([
            'name'=>'Jarabe 100 Ml',
            'description'=>'Jarabe 100 Ml'
        ]);
          Presentation::create([
            'name'=>'Jarabe 50 ML',
            'description'=>'Jarabe de 50ML'
        ]);
        Presentation::create([
          'name'=>'Perladp',
          'description'=>'Jarabe de 50ML'
      ]);
    }
}
