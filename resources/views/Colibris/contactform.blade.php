@extends('base')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">
        <h4>Vous souhaitez faire appel à nos services ?</h4>
        <p>Merci d'envoyer le formulaire ci-dessous afin que nous puissions répondre à vos besoins.<br> Nous nous efforcerons de répondre dans les plus brefs délais.</p>


            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nom_structure">Nom de votre structure</label>
                    <input type="text" name="nom_structure" id="nom_structure" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email de votre structure</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tel">Téléphone</label>
                    <input type="tel" name="tel" id="tel" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="profil">Profils de ou des personnes dans le cadre du dispositif ?</label>
                    <textarea name="profil" id="profil" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="periode">Période souhaitée</label>
                    <input type="text" name="periode" id="periode" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="budget">Votre budget</label>
                    <input type="text" name="budget" id="budget" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="problematique">La problématique</label>
                    <textarea name="problematique" id="problematique" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="objectif">L'objectif de ce séjour et les attentes</label>
                    <textarea name="objectif" id="objectif" class="form-control" rows="4" required></textarea>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            <br>
        </div>
        <div class="col-md-4">
            <h2>Coordonnées</h2>
            <address>
                <strong>Adresse :</strong><br>
                1 rue Jean Moulin<br>
                13500 Martigues<br>
            </address>
            <p>
                <strong>Téléphone :</strong> 06 14 97 64 30<br>
                <strong>Email :</strong> <a href="mailto:les.colibris.asso13@gmail.com">les.colibris.asso13@gmail.com</a>
            </p>
        </div>
    </div>
</div>
@endsection
