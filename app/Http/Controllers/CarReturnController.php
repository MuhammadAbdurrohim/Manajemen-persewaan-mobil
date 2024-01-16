<?php
namespace App\Http\Controllers;

use App\Models\CarReturn;
use App\Models\Booking;
use Illuminate\Http\Request;

class CarReturnController extends Controller
{
    public function index()
    {
        $returns = CarReturn::all();
        return view('returns.index', compact('returns'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'car_plate' => 'required|exists:bookings,car_plate',
            // Add more validation rules as needed
        ]);

        // Get booking details
        $booking = Booking::where('car_plate', $request->car_plate)->first();

        // Calculate the duration of the rental
        $start_date = $booking->start_date;
        $end_date = now(); // You may need to adjust this based on your logic
        $rental_days = $start_date->diffInDays($end_date);

        // Calculate the total rental cost based on the daily rate
        $daily_rate = $booking->car->daily_rate; // Assuming 'daily_rate' is a column in the 'cars' table
        $total_cost = $rental_days * $daily_rate;

        // Create a new CarReturn record
        $return = new CarReturn([
            'car_plate' => $request->car_plate,
            'return_date' => $end_date,
            'rental_days' => $rental_days,
            'total_cost' => $total_cost,
            // Add more return details as needed
        ]);

        // Save the return details
        $return->save();

        // Optionally, you can update the booking status or perform other actions

        // Redirect back with a success message
        return redirect()->route('returns.index')->with('message', 'Car successfully returned!');
    }


}
