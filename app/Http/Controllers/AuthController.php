<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Crée un nouvel utilisateur enregistré dans la base de données avec un nom, un email et un mot de passe chiffré.
    public function createUser(){
        User::create([
            'name' => '',
            'email' => '',
            'password' => bcrypt(''),
        ]);
    }

    // Affiche la vue de connexion pour l'utilisateur.
    public function login()
    {
        return view('auth.login');
    }

    // Déconnecte l'utilisateur courant et redirige vers la page de connexion.
    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }

    // Vérifie les informations d'identification fournies lors de la tentative de connexion.
    // Si les informations sont valides, régénère la session et redirige vers la page d'accueil.
    // Sinon, redirige vers la page de connexion avec un message d'erreur.
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return redirect()->route('auth.login')->withErrors([
            'email' => "Email invalide"
        ])->withInput($request->only('email'));
    }
}
