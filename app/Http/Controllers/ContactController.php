<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        
        // Valideer het formulier
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Stuur de e-mail
        Mail::to('bilal.essalhi2004@gmail.com')->send(new ContactMail($validatedData));
        exit(__FILE__);

        return redirect()->back()->with('success', 'Bedankt voor uw bericht. We nemen binnenkort contact met u op.');
    }
}
