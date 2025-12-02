<?php

use App\Models\User;
use App\Models\alsCategory;
use App\Models\alsSupplier;
use App\Models\alsInsumo;
use App\Models\alsinvetory;
use App\Models\alsInventoryInsumo;
use App\Models\alsProduct;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Usuario admin por defecto
    $this->admin = User::create([
        'name' => 'Admin',
        'surname' => 'Test',
        'phone' => '999999999',
        'fecha_nacimiento' => '2000-01-01',
        'email' => 'admin@test.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
    ]);
});

/*
|--------------------------------------------------------------------------
| 🔐 PRUEBAS DE AUTENTICACIÓN Y ROLES
|--------------------------------------------------------------------------
*/

it('permite al admin acceder al panel principal', function () {
    $this->actingAs($this->admin)
        ->get('/')
        ->assertStatus(200);
});

it('deniega acceso a rutas admin a usuario no autenticado', function () {
    $response = $this->get('/insumos');
    $response->assertRedirect('login');
});

it('permite cerrar sesión correctamente', function () {
    $this->actingAs($this->admin);
    $this->get('/logout')->assertRedirect('/login');
});

/* ✅ NUEVA: redirige correctamente al dashboard tras login */
it('redirige al dashboard luego del login correcto', function () {
    $response = $this->post('/login', [
        'email' => 'admin@test.com',
        'password' => 'password',
    ]);

    $response->assertRedirect('/');
});

/*
|--------------------------------------------------------------------------
| 📂 CATEGORY CONTROLLER TESTS
|--------------------------------------------------------------------------
*/

it('muestra la lista de categorías', function () {
    $this->actingAs($this->admin);
    $response = $this->get('/product_categories');
    $response->assertStatus(200);
});


/*
|--------------------------------------------------------------------------
| 🧩 SUPPLIER CONTROLLER TESTS
|--------------------------------------------------------------------------
*/



it('muestra la vista de creación de proveedor', function () {
    $this->actingAs($this->admin)
        ->get('/supplier/create')
        ->assertStatus(200)
        ->assertSee('Proveedor');
});

/*
|--------------------------------------------------------------------------
| ⚙️ INSUMO CONTROLLER TESTS
|--------------------------------------------------------------------------
*/

it('crea un insumo asociado a proveedor y categoría', function () {
    $this->actingAs($this->admin);
    $category = alsCategory::create(['name' => 'Materia Prima', 'description' => 'Categoría']);
    $supplier = alsSupplier::create(['name' => 'Proveedor Test', 'contact_email' => 'a@a.com', 
    'phone_number' => '999', 'address' => 'Calle Falsa 123']);

    $data = [
        'nombre' => 'Alcohol',
        'descripcion' => 'Alcohol 70%',
        'tipo' => 'Líquido',
        'stock' => 100,
        'unidad' => 'L',
        'estado' => 'Disponible',
        'costo_unitario' => 5.50,
        'als_supplier_id' => $supplier->id,
        'als_category_id' => $category->id,
    ];

    $response = $this->post('/insumos', $data);
    $response->assertRedirect('/insumos');
    $this->assertDatabaseHas('als_insumos', ['nombre' => 'Alcohol']);
});

/*
|--------------------------------------------------------------------------
| 🔗 INVENTARIO-INSUMO RELACIONAL TESTS
|--------------------------------------------------------------------------
*/

it('asocia un insumo a un inventario', function () {
    // Crear primero proveedor y categoría (para las llaves foráneas)
    $supplier = alsSupplier::create([
        'name' => 'Proveedor A',
        'phone_number' => '999999999',
        'address' => 'Av. Central 123',
        'contact_email' => 'contacto@proveedor.com',
    ]);

    $category = alsCategory::create([
        'name' => 'Categoría A',
        'description' => 'Categoría de prueba',
    ]);

    // Crear insumo con las claves válidas
    $insumo = alsInsumo::create([
        'nombre' => 'Guantes',
        'descripcion' => 'Látex',
        'tipo' => 'Desechable',
        'stock' => 100,
        'unidad' => 'Par',
        'estado' => 'Activo',
        'costo_unitario' => 0.5,
        'als_supplier_id' => $supplier->id,
        'als_category_id' => $category->id,
    ]);

    // Crear inventario
    $inventario = alsinvetory::create([
        'descripcion' => 'Inventario Test',
        'costo_total' => 0,
        'cantidad_usada' => 0,
    ]);

    // Asociar insumo ↔ inventario
    alsInventoryInsumo::create([
        'als_insumos_id' => $insumo->id,
        'alsinvetories_id' => $inventario->id,
        'cantidad_usada' => 10,
    ]);

    // Verificar en base de datos
    $this->assertDatabaseHas('als_inventory_insumos', [
        'als_insumos_id' => $insumo->id,
        'alsinvetories_id' => $inventario->id,
        'cantidad_usada' => 10,
    ]);
});

it('muestra lista de productos', function () {
    $this->actingAs($this->admin);
    $response = $this->get('/products');
    $response->assertStatus(200);
});

/*
|--------------------------------------------------------------------------
| 🧍 USER CONTROLLER TESTS
|--------------------------------------------------------------------------
*/

it('registra un nuevo usuario cliente', function () {
    $data = [
        'name' => 'Carlos',
        'surname' => 'López',
        'phone' => '900900900',
        'fecha_nacimiento' => '1999-09-09',
        'email' => 'cliente@test.com',
        'password' => Hash::make('123456'),
        'role' => 'cliente',
    ];
    User::create($data);
    $this->assertDatabaseHas('users', ['email' => 'cliente@test.com']);
});

/*Antiguas */

/* ---------------------------------------------------
| 🔹 INSUMOS TESTS
|---------------------------------------------------*/

test('muestra la vista index con insumos', function () {
    $category = alsCategory::create(['name' => 'Categoría Test', 'description' => 'Descripción categoría']);
    $supplier = alsSupplier::create([
        'name' => 'Proveedor Test',
        'contact_email' => 'proveedor@test.com',
        'phone_number' => '999999999',
        'address' => 'Dirección test'
    ]);

    alsInsumo::create([
        'nombre' => 'Insumo A',
        'descripcion' => 'Desc prueba',
        'tipo' => 'Tipo1',
        'stock' => 10,
        'unidad' => 'unidad',
        'estado' => 'activo',
        'costo_unitario' => 12.50,
        'als_supplier_id' => $supplier->id,
        'als_category_id' => $category->id
    ]);

    $this->actingAs($this->admin);
    $response = $this->get(route('insumos.index'));
    $response->assertStatus(200);
    $response->assertViewHas('insumos');
});

test('muestra la vista create con categorias y proveedores', function () {
    alsCategory::create(['name' => 'Cat Test', 'description' => 'Desc cat']);
    alsSupplier::create([
        'name' => 'Prov Test',
        'contact_email' => 'prov@test.com',
        'phone_number' => '999999999',
        'address' => 'Av. Test 123'
    ]);

    $this->actingAs($this->admin);
    $response = $this->get('/insumos/create');
    $response->assertStatus(200);
    $response->assertViewHasAll(['categorys', 'suppliers']);
});

test('puede guardar un nuevo insumo', function () {
    $category = alsCategory::create(['name' => 'Cat 1', 'description' => 'Desc cat']);
    $supplier = alsSupplier::create([
        'name' => 'Prov 1',
        'contact_email' => 'prov1@test.com',
        'phone_number' => '999999999',
        'address' => 'Calle Falsa 123'
    ]);

    $this->actingAs($this->admin);
    $response = $this->post('/insumos', [
        'nombre' => 'Insumo Nuevo',
        'costo_unitario' => 5.5,
        'stock' => 20,
        'descripcion' => 'Insumo de prueba',
        'tipo' => 'tipoA',
        'unidad' => 'unidad',
        'estado' => 'activo',
        'als_category_id' => $category->id,
        'als_supplier_id' => $supplier->id
    ]);

    $response->assertRedirect('/insumos');
    $this->assertDatabaseHas('als_insumos', ['nombre' => 'Insumo Nuevo']);
});

test('muestra la vista edit con los datos del insumo', function () {
    $category = alsCategory::create(['name' => 'Cat Edit', 'description' => 'Desc cat']);
    $supplier = alsSupplier::create([
        'name' => 'Prov Edit',
        'contact_email' => 'prov@edit.com',
        'phone_number' => '999999999',
        'address' => 'Av. Edit'
    ]);

    $insumo = alsInsumo::create([
        'nombre' => 'Insumo Edit',
        'descripcion' => 'Desc edit',
        'tipo' => 'tipoB',
        'stock' => 15,
        'unidad' => 'unidad',
        'estado' => 'activo',
        'costo_unitario' => 10.0,
        'als_supplier_id' => $supplier->id,
        'als_category_id' => $category->id
    ]);

    $this->actingAs($this->admin);
    $response = $this->get("/insumos/{$insumo->id}/edit");
    $response->assertStatus(200);
    $response->assertViewHas('insumo');
});

test('puede actualizar un insumo existente', function () {
    $category = alsCategory::create(['name' => 'Cat Update', 'description' => 'Desc cat']);
    $supplier = alsSupplier::create([
        'name' => 'Prov Update',
        'contact_email' => 'prov@update.com',
        'phone_number' => '999999999',
        'address' => 'Av. Update'
    ]);

    $insumo = alsInsumo::create([
        'nombre' => 'Insumo Viejo',
        'descripcion' => 'Desc vieja',
        'tipo' => 'tipoC',
        'stock' => 5,
        'unidad' => 'unidad',
        'estado' => 'activo',
        'costo_unitario' => 2.5,
        'als_supplier_id' => $supplier->id,
        'als_category_id' => $category->id
    ]);

    $this->actingAs($this->admin);
    $response = $this->put("/insumos/{$insumo->id}", [
        'nombre' => 'Insumo Actualizado',
        'descripcion' => 'Nueva desc',
        'tipo' => 'tipoC',
        'stock' => 25,
        'unidad' => 'unidad',
        'estado' => 'activo',
        'costo_unitario' => 3.5,
        'als_supplier_id' => $supplier->id,
        'als_category_id' => $category->id
    ]);

    $response->assertRedirect('/insumos');
    $this->assertDatabaseHas('als_insumos', ['nombre' => 'Insumo Actualizado']);
});

/* ---------------------------------------------------
| 🔹 INVENTARIO TESTS
|---------------------------------------------------*/

test('muestra la vista index del inventario', function () {
    $this->actingAs($this->admin);
    $response = $this->get('/inventario');
    $response->assertStatus(200);
});

test('muestra la vista create del inventario con insumos activos', function () {
    $categoria = alsCategory::create(['name' => 'Categoría A', 'description' => 'Desc cat A']);
    $proveedor = alsSupplier::create([
        'name' => 'Proveedor A',
        'contact_email' => 'prov@example.com',
        'phone_number' => '999999999',
        'address' => 'Lima'
    ]);

    alsInsumo::create([
        'nombre' => 'Insumo activo',
        'descripcion' => 'Desc insumo',
        'tipo' => 'Tipo 1',
        'stock' => 10,
        'unidad' => 'kg',
        'estado' => 'activo',
        'costo_unitario' => 15.5,
        'als_supplier_id' => $proveedor->id,
        'als_category_id' => $categoria->id,
    ]);

    $this->actingAs($this->admin);
    $response = $this->get('/inventario/create');
    $response->assertStatus(200);
    $response->assertViewHas('insumos');
});

/**
 * 🔹 5. Muestra el detalle del inventario
 */
test('muestra el detalle del inventario', function () {
    $inventario = alsinvetory::create([
        'descripcion' => 'Inventario detalle',
        'cantidad_usada' => 1,
        'costo_total' => 10,
    ]);

    $response = $this->get("/inventario/{$inventario->id}/detalle");
    $response->assertStatus(200);
    $response->assertViewHas('inventario');
});

/**
 * 🔹 6. Buscar insumo activo por nombre
 */
test('puede buscar un insumo activo por nombre', function () {
    $categoria = alsCategory::create([
        'name' => 'Cat B',
        'description' => 'Desc'
    ]);

    $proveedor = alsSupplier::create([
        'name' => 'Prov B',
        'contact_email' => 'prov@example.com',
        'phone_number' => '123456789',
        'address' => 'Lima'
    ]);

    alsInsumo::create([
        'nombre' => 'Azúcar',
        'descripcion' => 'Insumo dulce',
        'tipo' => 'Ingrediente',
        'stock' => 50,
        'unidad' => 'kg',
        'estado' => 'activo',
        'costo_unitario' => 5.0,
        'als_supplier_id' => $proveedor->id,
        'als_category_id' => $categoria->id,
    ]);

    $response = $this->get('/api/insumos/buscar?nombre=Azú');
    $response->assertStatus(200);
    $response->assertJsonFragment(['nombre' => 'Azúcar']);
});
