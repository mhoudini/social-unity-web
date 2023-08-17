<?php

namespace App\Http\Requests\Recrutement;

use Illuminate\Foundation\Http\FormRequest;

class OffreEmploiFormRequest extends FormRequest
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
            'intitule' => ['required', 'string', 'max:255'],
            'offre' => ['required', 'string', 'max:255'],
            'periode' => ['required', 'string', 'max:255'],
            'mission' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:0'],
            'pourvue' => ['required', 'boolean'],
        ];
    }
}
