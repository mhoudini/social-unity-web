<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColibrisContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    // Affiche le formulaire de contact.
    public function showContactForm()
    {
        return view('Colibris.contactform');
    }

    // Traite le formulaire de contact en envoyant un email à l'adresse spécifiée.
    public function contact(ColibrisContactRequest $request)
    {
        Mail::to('les.colibris.asso13@gmail.com')->send(new ContactMail($request->validated()));
        $data = $request->validated();
        return redirect()->route('contact.show')->with('success', "Votre formulaire a bien été envoyé !");
    }
}
