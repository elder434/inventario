<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoEntregadoController;
use App\Http\Controllers\ResponableController;
use App\Http\Controllers\TemporalController;
use App\Models\Temporal;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::controller(ProductoController::class) ->group(function(){
    Route::get('/','index')->name('producto.index');
    Route::get('create','create')->name('producto.create');
    Route::get('edit/{producto}','edit')->name('producto.edit'); 
    Route::post('creacion','store')->name('producto.store');
    Route::put('{producto}','update')->name('producto.update');
    Route::delete('{producto}','destroy')->name('producto.destroy');
    Route::get('add','add')->name('producto.add');
    Route::post('add','up')->name('producto.up');
    Route::get('view','viewp')->name('producto.viewp');
    Route::get('editpro/{tipo}','editpro')->name('producto.editpro');
    Route::put('editar/{tipo}','editar')->name('producto.editar');
    Route::delete('tipo/{tipo}','destruir')->name('producto.destruir');
   
});

Route::controller(ProductoEntregadoController::class) ->group(function(){
    Route::get('historial/','index')->name('historial.index');
    Route::get('historial/creatre/{productos}','create')->name('historial.create');
    Route::post('historial/creacion/{productos}','store')->name('historial.store');
    Route::delete('historial/{tipo}','eliminar')->name('historial.eliminar');
    Route::get('historial/edit/{tipos}','edit')->name('historial.edit');
    Route::put('historial/{tipos}','update')->name('historial.update');
    Route::get('view/{tipos}','print')->name('historial.print');
    Route::get('imprimir/','imprimir')->name('historial.imprimir');
        
});

Route::controller(TemporalController::class)->group(function(){
    Route::get('historialT/index','index')->name('temporal.index');
    Route::get('historial/imprimir','imprimir')->name('temporal.imprimir');
    Route::delete('historialT/{tipo}','eliminar')->name('temporal.eliminar');
    Route::get('historialT/edit/{tipos}','edit')->name('temporal.edit');
    Route::put('historialT/{tipos}','update')->name('temporal.update');
    Route::get('historialT/destroy','destroy')->name('temporal.destroy');
});

Route::controller(ResponableController::class) ->group(function(){
    Route::get('responsable/index','index')->name('responsable.index');
    Route::get('responsable/creaccion','creacion')->name('responsable.creacion');
    Route::post('responsable/creaccion','store')->name('responsable.store');
    Route::get('responsable/edit/{responsable}','edit')->name('responsable.edit');
    Route::put('responsable/{responsable}','update')->name('responsable.update');
    Route::delete('responsable/{responsable}','delete')->name('responsable.delete');

});


