<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success', 'Bedankt voor uw bericht!');
    }

    public function showForm()
    {
        return view('contact'); // Ga ervan uit dat je een blade-bestand 'contact.blade.php' hebt in de views map
    }

    public function submitForm(Request $request) {
        // Verwerk het formulier en stuur een succesbericht naar de weergave
    return view('form')->with('success_message', 'Bedankt voor het verzenden van het formulier!');
    }


}