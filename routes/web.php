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
// Route::middleware(['auth', 'role:admin'])->get('/products', [ProductController::class, 'index'])->name('products.admin');
// Route::middleware(['auth', 'role:cliente'])->get('/products', [ProductController::class, 'indexcli'])->name('products.cliente');

Route::resource('suppliers', supplierController::class);
Route::resource('buys', buyController::class);
Route::resource('product_categories', categoryController::class);
Route::resource('orders', orderController::class);
Route::resource('insumos', insumoController::class);
Route::resource('inventario', inventarioController::class);
Route::resource('inventario_insumo', InventarioInsumoController::class);

//Detalle
Route::get('inventario/{id}/detalle', [inventarioController::class, 'detalle'])->name('inventario.detalle');

//Buscador de Insumos
Route::get('/api/insumos/buscar', [App\Http\Controllers\inventarioController::class, 'buscarInsumo']);

//Vistas extras (Rutas publicas)
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


//Rutas para admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/insumos', [insumoController::class, 'index'])->name('insumos.index');
    Route::get('/inventario', [inventarioController::class, 'index'])->name('inventario.index');
    Route::post('/inventario', [inventarioController::class, 'store'])->name('inventario.store');
    // agrega aquí las demás rutas de gestión
});

//Rutas user
Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    //Para realizar las pruebas de selenium
    Route::get('/insumos', [insumoController::class, 'index'])->name('insumos.index');
    Route::get('/inventario', [inventarioController::class, 'index'])->name('inventario.index');
    Route::post('/inventario', [inventarioController::class, 'store'])->name('inventario.store');
});

// Catalogo
Route::get('/products', [ProductController::class, 'index'])->name('products.index');