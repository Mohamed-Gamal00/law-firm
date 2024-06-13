<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::paginate(20);
        return view('dashboard.emails.index', compact('emails'));
    }

    public function destroy(string $id)
    {
        $email = Email::findOrFail($id);
        // dd($contact);
        $email->delete();
        return Redirect::route('emails.index')->with('success', 'تم الحذف ب نجاح');
    }
}
