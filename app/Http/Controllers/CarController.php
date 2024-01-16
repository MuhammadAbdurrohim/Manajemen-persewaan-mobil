<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('car.index', compact('cars'));
    }

    public function create()
    {
        return view('car.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'plate_number' => 'required|string|unique:cars',
            'rental_rate' => 'required|numeric',
        ]);

        Car::create($request->all());

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambahkan.');
    }
}
