<?php

// app\Http\Controllers\BookingController.php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('booking.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Check car availability
        $car = Car::findOrFail($request->car_id);
        $existingBooking = Booking::where('car_id', $request->car_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })
            ->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'Mobil tidak tersedia pada tanggal yang diminta.');
        }

        // Create booking
        $booking = Booking::create([
            'car_id' => $request->car_id,
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Peminjaman berhasil dibuat.');
    }
}

