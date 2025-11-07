<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Si no existe ningún usuario, crea el primero como administrador
        if (User::count() === 0) {
            User::create([
                'name' => 'Administrador',
                'surname' => 'Principal',
                'phone' => '999999999',
                'fecha_nacimiento' => '1990-01-01',
                'email' => 'admin@floreria.com',
                'password' => Hash::make('admin123'), // puedes cambiar la contraseña
                'role' => 'admin',
            ]);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
