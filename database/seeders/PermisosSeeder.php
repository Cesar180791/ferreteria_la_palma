<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Permission::create([
            'name'=>'Categorias_Index',
            'guard_name'=>'web',
        ]);
       Permission::create([
            'name'=>'Productos_Index',
            'guard_name'=>'web',
        ]);
       Permission::create([
            'name'=>'Facturacion_Index',
            'guard_name'=>'web',
        ]);
       Permission::create([
            'name'=>'Usuarios_Index',
            'guard_name'=>'web',
        ]);
       Permission::create([
            'name'=>'Permisos_Index',
            'guard_name'=>'web',
        ]);
       Permission::create([
            'name'=>'Consulta_Venta_Index',
            'guard_name'=>'web',
        ]);
       Permission::create([
            'name'=>'Reportes_Index',
            'guard_name'=>'web',
        ]);
    }
}
