<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoriesController;
use App\Http\Livewire\SubCategoriesController;
use App\Http\Livewire\ProductsController;
use App\Http\Livewire\CreateBranchController;
use App\Http\Livewire\CoinsController; 
use App\Http\Livewire\PosController;
use App\Http\Livewire\ProveedoresController;
use App\Http\Livewire\ComprasController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\AsignarController;
use App\Http\Livewire\UserController;
use App\Http\Livewire\CashoutController;
use App\Http\Livewire\ReportComprasController;
use App\Http\Livewire\ReportsController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExportComprasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function (){

Route::group(['middleware' => ['role:Administrador']], function () {
    Route::get('categories', CategoriesController::class);
    Route::get('subcategories', SubCategoriesController::class);
    Route::get('products', ProductsController::class);
    Route::get('dinero', CoinsController::class);
    Route::get('proveedores', ProveedoresController::class);
    Route::get('compras', ComprasController::class);
    Route::get('permisos', PermisosController::class);
    Route::get('asignar', AsignarController::class);
    Route::get('usuarios', UserController::class);
    Route::get('roles', RolesController::class);
    Route::get('consulta-ventas', CashoutController::class);
    Route::get('reporte-venta', ReportsController::class);
    Route::get('reporte-compra', ReportComprasController::class);
    Route::get('reporte-venta-exportar-pdf/{user}/{type}/{f1}/{f2}', [ExportController::class,'reportVentaPDF']);
    Route::get('reporte-venta-exportar-pdf/{user}/{type}', [ExportController::class,'reportVentaPDF']);

    Route::get('reporte-compra-exportar-pdf/{user}/{type}/{f1}/{f2}', [ExportComprasController::class,'reportCompraPDF']);
    Route::get('reporte-compra-exportar-pdf/{user}/{type}', [ExportComprasController::class,'reportCompraPDF']);
   

});
Route::group(['middleware' => ['role:Cajero||Administrador']], function () {
    Route::get('facturacion', PosController::class);
});

});








