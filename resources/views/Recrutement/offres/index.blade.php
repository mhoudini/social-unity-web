@extends('base')

@section('title', 'Offres d\'emplois')

@section('content')
<br>
<div class="text-center">
    <h1>Offres d'emploi</h1>
    <h5>Contribuez à faire une différence positive, intégrez une association novatrice dans le secteur du social et de la santé.</h5>
</div>
<br>
<div class="d-flex justify-content-between align-items-center">
    @auth
        <a href="{{ route('Recrutement.offres.create') }}" class="btn btn-primary">Créer une annonce</a>
    @endauth
</div>

<!-- Tableau pour les écrans sm et plus grands -->
<div class="d-none d-sm-block">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Intitulé</th>
                <th>N°offre</th>
                <th>Période</th>
                <th>Mission</th>
                <th>Description</th>
                <th>Pourvue</th>
                <th class="text-end"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($offres as $offre)
            <tr>
                <td>{{ $offre->intitule }}</td>
                <td>{{ $offre->offre }}</td>
                <td>{{ $offre->periode }}</td>
                <td>{{ $offre->mission }}</td>
                <td>{{ $offre->description }}</td>
                <td>{{ $offre->pourvue ? 'Oui' : 'Non' }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        @auth
                            <a href="{{ route('Recrutement.offres.edit', $offre) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('Recrutement.offres.destroy', $offre) }}" method="post">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                            </form>
                        @endauth
                        @guest
                        <a href="mailto:les.colibris.asso13@gmail.com?subject=Postuler pour l'offre N°{{ $offre->offre }}" class="btn btn-primary">Postuler</a>
                        @endguest
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Contenu pour les écrans xs -->
<div class="d-block d-sm-none">
    @foreach($offres as $offre)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $offre->intitule }}</h5>
            <p class="card-text">
                N°offre: {{ $offre->offre }}<br>
                Période: {{ $offre->periode }}<br>
                Mission: {{ $offre->mission }}<br>
                Description: {{ $offre->description }}<br>
                Pourvue: {{ $offre->pourvue ? 'Oui' : 'Non' }}
            </p>
            @auth
                <a href="{{ route('Recrutement.offres.edit', $offre) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('Recrutement.offres.destroy', $offre) }}" method="post">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                </form>
            @endauth
            @guest
                <a href="mailto:les.colibris.asso13@gmail.com?subject=Postuler pour l'offre N°{{ $offre->offre }}" class="btn btn-primary">Postuler</a>
            @endguest
        </div>
    </div>
    @endforeach
</div>

{{ $offres->links() }}

@endsection
