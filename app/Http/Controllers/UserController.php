<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create() {
        return view('admin.users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,cliente'
        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return back()->with('success', 'Usuario creado correctamente');
    }
    // Mostrar formulario público
    public function showRegisterForm() {
        return view('admin.users.create'); // lo crearemos abajo
    }

    // Registrar usuario
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // usamos confirmation
        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'cliente', // fuerza rol de cliente
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente. Inicia sesión.');
    }

}
