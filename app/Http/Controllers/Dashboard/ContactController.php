<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(20);
        return view('dashboard.contacts.index', compact('contacts'));
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        // dd($contact);
        $contact->delete();
        return Redirect::route('contacts.index')->with('success', 'تم الحذف ب نجاح');

    }
}
