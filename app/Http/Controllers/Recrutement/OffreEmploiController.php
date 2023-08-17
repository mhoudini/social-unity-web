<?php

namespace App\Http\Controllers\Recrutement;

use App\Models\OffreEmploi;
use App\Http\Requests\Recrutement\OffreEmploiFormRequest;
use App\Http\Controllers\Controller;

class OffreEmploiController extends Controller
{
    public function index()
    {
        return view('Recrutement.offres.index', ['offres' => OffreEmploi::orderBy('created_at', 'desc')->paginate(25)]);
    }

    public function create()
    {
        $offre = new OffreEmploi();
        $offre->fill([
            'intitule' => old('intitule', 'Educateur spécialisé'),
            'offre' => old('offre', '251200'),
            'periode' => old('periode', 'Du 01/07/2023 au 31/07/2023'),
            'mission' => old('mission', 'Accompagnement éducative pour un séjour de Rupture'),
            'description' => old('description', 'Nous recherchons un(e) accompagnateur(trice) éducatif(ve) pour encadrer et accompagner un séjour de rupture pour des jeunes en difficulté. Votre rôle consistera à organiser et animer des activités pédagogiques et ludiques, à favoriser la socialisation et l\'épanouissement des jeunes, ainsi qu\'à assurer leur sécurité et leur bien-être tout au long du séjour. Vous travaillerez en étroite collaboration avec les autres membres de l\'équipe d\'encadrement et les professionnels de l\'éducation pour garantir la réussite de ce séjour de rupture. Si vous êtes passionné(e) par l\'éducation, que vous avez le sens de l\'écoute et de la communication, et que vous êtes capable de travailler en équipe dans un environnement stimulant, nous vous invitons à postuler à cette offre dès maintenant.')
        ]);

        return view('Recrutement.offres.form', ['offre' => $offre]);
    }

    public function store(OffreEmploiFormRequest $request)
    {
        OffreEmploi::create($request->validated());
        return redirect()->route('Recrutement.offres.index')->with('success', 'Offre d\'emploi créée avec succès');
    }

    public function edit(string $id)
    {
        $offre = OffreEmploi::findOrFail($id);
        return view('Recrutement.offres.form', ['offre' => $offre]);
    }

    public function update(OffreEmploiFormRequest $request, string $id)
    {
        $offre = OffreEmploi::findOrFail($id);
        $offre->update($request->validated());
        return redirect()->route('Recrutement.offres.index')->with('success', 'Offre d\'emploi mise à jour avec succès');
    }

    public function destroy(string $id)
    {
        $offre = OffreEmploi::findOrFail($id);
        $offre->delete();
        return redirect()->route('Recrutement.offres.index')->with('success', 'Offre d\'emploi supprimée avec succès');
    }
}
