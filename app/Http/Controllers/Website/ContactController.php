<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::first() ?? new Setting();
        return view('website.contact-us.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'subject' => 'nullable',
            'g-recaptcha-response' => 'required|captcha'
        ],[
            "g-recaptcha-response.required" => "يجب التأكيد انك لست روبوت"
        ]);

        // dd($data);
        Contact::create($data);

        return Redirect::route('contact')->with('success', 'تم الارسال بنجاح');
    }
}
