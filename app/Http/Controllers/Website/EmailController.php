<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:emails,email',
        ], [
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني يجب أن يكون عنوان بريد إلكتروني صالح.',
            'email.unique' => 'هذا البريد الإلكتروني مسجل مسبقاً.',
        ]);
        // dd($data);
        Email::create($data);
        return redirect()->back()->with('success', 'تم الإرسال بنجاح');
    }
}
