<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('welcome');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'sim_number' => 'required|string',
        ]);

        // Simpan data pengguna ke database
        User::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'sim_number' => $request->input('sim_number'),
        ]);

        return redirect()->route('register.form')->with('success', 'Registrasi berhasil!');
    }
}
