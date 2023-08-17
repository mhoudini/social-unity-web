<?php

namespace App\Http\Controllers;

class DonController extends Controller
{
    // Affiche la page de don.
    public function don()
    {
        return view('Colibris.don');
    }
}
