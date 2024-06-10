<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    public function index()
    {
        $settings = Setting::first() ?? new Setting();
        return view('website.booking.index',compact('settings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'subject' => 'nullable',
            'date' => 'required',
        ]);

        // dd($data);
        Booking::create($data);

        return Redirect::route('booking')->with('success', 'تم التسجيل بنجاح');
    }
}
