<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\buyController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\insumoController;
use App\Http\Controllers\inventarioController;
use App\Http\Controllers\InventarioInsumoController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Vistas segun rol
Route::get('/products', [ProductController::class, 'index'])->name('productGeneral.product.index'); // cliente
// Route::get('/admin/products', [ProductController::class, 'index'])->name('productGeneral.product.index'); // admin

Route::middleware(['auth'])->group(function () {
    Route::resource('insumos', insumoController::class);
    Route::resource('product_categories', categoryController::class);
    Route::resource('supplier', supplierController::class);
    Route::resource('inventario', inventarioController::class);
    Route::resource('products', ProductController::class);
    Route::resource('inventario_insumo', InventarioInsumoController::class);
    Route::resource('suppliers', supplierController::class);
    // cualquier otra ruta de administración
});

Route::resource('buys', buyController::class);

Route::resource('orders', orderController::class);



//Detalle
Route::get('inventario/{id}/detalle', [inventarioController::class, 'detalle'])->name('inventario.detalle');

//Buscador de Insumos
Route::get('/api/insumos/buscar', [App\Http\Controllers\inventarioController::class, 'buscarInsumo']);

//Vistas extras
Route::get('/contactanos', function () {
    return view('vistasextra.contactanos');
})->name('contactanos');
Route::get('/nosotros', function () {
    return view('vistasextra.sobrenoso');
})->name('nosotros');

//Inicio de sesion
// Login
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Usuarios (solo admin)
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin/users/create', [UserController::class, 'create' ])->name('admin.users.create');
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
});

//Usuarios (público)
// Registro público de clientes
Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'register'])->name('register.post');


