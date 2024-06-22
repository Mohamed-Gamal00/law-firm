<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\MailClients;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::paginate(20);
        return view('dashboard.emails.index', compact('emails'));
    }

    public function create()
    {
        $emails = Email::all();
        return view('dashboard.emails.create-email', compact('emails'));
    }
    public function send(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'emails' => 'required|array',
            'emails.*' => 'email',
        ]);

        $emails = $request->emails;
        // dd($emails);

        foreach ($emails as $email) {
            Mail::to($email)->send(new MailClients($data));
        }

        return redirect()->route('emails.index')->with('success', 'تم ارسال الايميل بنجاح');
    }


    public function destroy(string $id)
    {
        $email = Email::findOrFail($id);
        // dd($contact);
        $email->delete();
        return Redirect::route('emails.index')->with('success', 'تم الحذف ب نجاح');
    }
}
