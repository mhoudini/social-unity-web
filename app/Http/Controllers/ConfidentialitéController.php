<?php

namespace App\Http\Controllers;

class ConfidentialitéController extends Controller
{
    // Affiche la page de confidentialité.
    public function confidentialité()
    {
        return view('Colibris.Confidentialité');
    }
}
