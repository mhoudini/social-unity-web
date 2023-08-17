<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ColibrisContactRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Récupère les règles de validation qui s'appliquent à la demande.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom_structure' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email'],
            'tel' => ['required', 'string','regex:/^(\+33|0)[1-9]\d{8}$/' ],
            'profil' => ['required', 'string', 'min:2'],
            'periode' => ['required'],
            'budget' => ['required'],
            'problematique' => ['required', 'string', 'min:2'],
            'objectif' => ['required', 'string', 'min:2'],
        ];
    }
}
