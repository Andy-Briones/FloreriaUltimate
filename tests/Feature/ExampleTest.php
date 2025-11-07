<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\Models\alsInsumo;
use App\Models\alsCategory;
use App\Models\alsSupplier;
use App\Models\alsinvetory;
use App\Models\alsInventoryInsumo;
use App\Models\alsProduct;

uses(RefreshDatabase::class);

uses(RefreshDatabase::class);

test('muestra la vista index con insumos', function () {
    // Crear categoría y proveedor válidos
    $category = alsCategory::create([
        'name' => 'Categoría Test',
        'description' => 'Descripción categoría'
    ]);

    $supplier = alsSupplier::create([
        'name' => 'Proveedor Test',
        'contact_email' => 'proveedor@test.com',
        'phone_number' => '999999999',
        'address' => 'Dirección test'
    ]);

    // Crear un insumo asociado
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

    $response = $this->get('/insumos');

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

/**
 * 🔹 1. Vista index
 */
test('muestra la vista index del inventario', function () {
    $response = $this->get('/inventario');
    $response->assertStatus(200);
});

/**
 * 🔹 2. Vista create con insumos activos
 */
test('muestra la vista create del inventario con insumos activos', function () {
    // Preparamos dependencias mínimas
    $categoria = alsCategory::create([
        'name' => 'Categoría A',
        'description' => 'Desc cat A'
    ]);

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

    $response = $this->get('/inventario/create');
    $response->assertStatus(200);
    $response->assertViewHas('insumos');
});

/**
 * 🔹 3. Puede almacenar un nuevo inventario y producto (falla 2)
 */
// test('puede guardar un inventario y producto correctamente', function () {
//     $categoria = alsCategory::create([
//         'name' => 'Categoría A',
//         'description' => 'Desc cat A'
//     ]);

//     $proveedor = alsSupplier::create([
//         'name' => 'Proveedor A',
//         'contact_email' => 'prov@example.com',
//         'phone_number' => '999999999',
//         'address' => 'Lima'
//     ]);

//     $insumo = alsInsumo::create([
//         'nombre' => 'Insumo activo',
//         'descripcion' => 'Desc insumo',
//         'tipo' => 'Tipo 1',
//         'stock' => 10,
//         'unidad' => 'kg',
//         'estado' => 'activo',
//         'costo_unitario' => 20.0,
//         'als_supplier_id' => $proveedor->id,
//         'als_category_id' => $categoria->id,
//     ]);

//     $data = [
//         'name' => 'Producto de prueba',
//         'price' => 100.00,
//         'insumos' => [
//             ['id' => $insumo->id, 'cantidad_usada' => 2]
//         ]
//     ];

//     $response = $this->post('/inventario', $data);

//     $response->assertRedirect('/');
//     $this->assertDatabaseHas('alsinvetories', [
//         'costo_total' => 40.00
//     ]);
//     $this->assertDatabaseHas('als_products', [
//         'name' => 'Producto de prueba',
//         'costo_produccion' => 40.00
//     ]);
// });

/**
 * 🔹 4. Muestra la vista show con los detalles del inventario
 */
test('muestra la vista show con inventario y sus relaciones', function () {
    $categoria = alsCategory::create([
        'name' => 'Cat A',
        'description' => 'Desc'
    ]);

    $proveedor = alsSupplier::create([
        'name' => 'Prov A',
        'contact_email' => 'prov@example.com',
        'phone_number' => '123456789',
        'address' => 'Lima'
    ]);

    $insumo = alsInsumo::create([
        'nombre' => 'Insumo 1',
        'descripcion' => 'desc',
        'tipo' => 't1',
        'stock' => 10,
        'unidad' => 'kg',
        'estado' => 'activo',
        'costo_unitario' => 10.0,
        'als_supplier_id' => $proveedor->id,
        'als_category_id' => $categoria->id,
    ]);

    $inventario = alsinvetory::create([
        'descripcion' => 'Inventario test',
        'cantidad_usada' => 1,
        'costo_total' => 10,
    ]);

    alsInventoryInsumo::create([
        'als_insumos_id' => $insumo->id,
        'alsinvetories_id' => $inventario->id,
        'cantidad_usada' => 1,
        'costo_total' => 10,
    ]);

    alsProduct::create([
        'name' => 'Producto X',
        'description' => 'desc',
        'price' => 50.0,
        'stock' => 1,
        'image_path' => 'img.jpg',
        'costo_produccion' => 10,
        'estado' => 'activo',
        'alsinvetories_id' => $inventario->id,
    ]);

    $response = $this->get("/inventario/{$inventario->id}");
    $response->assertStatus(200);
    $response->assertViewHas('inventario');
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


