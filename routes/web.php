<?php

use App\Http\Controllers\buyController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\insumoController;
use App\Http\Controllers\inventarioController;
use App\Http\Controllers\InventarioInsumoController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\supplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', productController::class);
Route::resource('suppliers', supplierController::class);
Route::resource('buys', buyController::class);
Route::resource('product_categories', categoryController::class);
Route::resource('orders', orderController::class);
Route::resource('insumos', insumoController::class);
Route::resource('inventario', inventarioController::class);
Route::resource('inventario_insumo', InventarioInsumoController::class);

//Detalle
Route::get('inventario/{id}/detalle', [inventarioController::class, 'detalle'])->name('inventario.detalle');

//Vistas extras
Route::get('/contactanos', function () {
    return view('vistasextra.contactanos');
})->name('contactanos');
Route::get('/nosotros', function () {
    return view('vistasextra.sobrenoso');
})->name('nosotros');
