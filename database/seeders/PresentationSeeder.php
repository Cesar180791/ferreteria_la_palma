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
            'name'=>'PVC de 1/2"',
            'description'=>'PVC de 1/2"'
        ]);
         Presentation::create([
            'name'=>'PVC de 1"',
            'description'=>'PVC de 1"'
        ]);
          Presentation::create([
            'name'=>'PVC de 2"',
            'description'=>'PVC de 2"'
        ]);
          Presentation::create([
            'name'=>'PVC de 4"',
            'description'=>'PVC de 4"'
        ]);
    }
}
