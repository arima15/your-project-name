<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'service' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
        ]);

        // Check for existing booking with the same details
        $existingBooking = Booking::where('name', $request->name)
            ->where('email', $request->email)
            ->where('phone', $request->phone)
            ->where('address', $request->address)
            ->where('service', $request->service)
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->first();

        if ($existingBooking) {
            return response()->json(['success' => false, 'message' => 'Booking already exists.'], 409);
        }

        Booking::create($request->all());

        return response()->json(['success' => true]);
    }

    public function showPending()
    {
        $bookings = Booking::all(); // Fetch all bookings
        return view('dash.pending', compact('bookings')); // Pass bookings to the view
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id); // Fetch the booking by ID
        return view('Homepage.confirmation_page', compact('booking')); // Pass booking to the confirmation view
    }

    public function cancel($id)
    {
        $booking = Booking::findOrFail($id); // Fetch the booking by ID
        $booking->delete(); // Delete the booking

        return response()->json(['success' => true]); // Return a success response
    }
}
