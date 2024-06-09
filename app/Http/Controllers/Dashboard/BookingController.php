<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::paginate(20);
        return view('dashboard.booking.index', compact('booking'));
    }

    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        // dd($booking);
        $booking->delete();
        return Redirect::route('booking.index')->with('success', 'تم الحذف ب نجاح');
    }
}
