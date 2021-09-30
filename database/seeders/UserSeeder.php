<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Mateo Leo',
            'phone'=>'752082200',
            'email'=>'leo@gmail.com',
            'profile'=>'ADMIN',
            'status'=>'ACTIVE',
            'password'=>bcrypt('12345678')
        ]);
        User::create([
            'name'=>'Aurora Leo',
            'phone'=>'752082200',
            'email'=>'Auro@gmail.com',
            'profile'=>'EMPLOYEE',
            'status'=>'ACTIVE',
            'password'=>bcrypt('12345678')
        ]);
    }
}
