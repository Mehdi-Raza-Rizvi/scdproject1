<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Show checkout page
    public function checkout()
    {
        // Get selected property from localStorage via JavaScript
        return view('appointment.checkout');
    }

    // Process checkout
    public function processCheckout(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1|max:20',
            'payment_method' => 'required|in:credit_card,bank_transfer,cash',
            'property_title' => 'required|string',
            'property_price' => 'required|string',
            'notes' => 'nullable|string|max:500'
        ]);

        // Store booking data in session
        session([
            'booking_data' => $validated,
            'booking_id' => 'BK-' . time() . rand(100, 999)
        ]);

        // Clear cart from localStorage via JavaScript
        return redirect()->route('appointment.thankyou');
    }

    // Thank you page
    public function thankYou()
    {
        if (!session('booking_data')) {
            return redirect()->route('appointment.checkout');
        }

        $bookingData = session('booking_data');
        $bookingId = session('booking_id');

        // Clear session data after displaying
        session()->forget(['booking_data', 'booking_id']);

        return view('appointment.thankyou', compact('bookingData', 'bookingId'));
    }
}