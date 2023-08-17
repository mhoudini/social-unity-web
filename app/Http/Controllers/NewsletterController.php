<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class NewsletterController extends Controller
{
    // Affiche le formulaire d'inscription à la newsletter.
    public function createSubscriber()
    {
        return view('colibris.subscribe');
    }

    // Enregistre un nouvel abonné à la newsletter en vérifiant l'adresse e-mail.
    public function storeSubscriber(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers'
        ]);

        $subscriber = new Subscriber(['email' => $request->email]);
        $subscriber->save();

        return redirect()->back()->with('success', 'Inscription réussie!');
    }
}
