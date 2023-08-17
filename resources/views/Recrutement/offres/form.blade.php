@extends('base')

@section('title', $offre->exists ? "Modifier une offre d'emploi" : "Créer une offre d'emploi")

@section('content')

    <h1>@yield('title')</h1>
    <br>

    <form class="d-grid gap-2 mx-auto p-3 shadow-lg bg-white text-left" style="width: 100%; max-width: 50rem;" action="{{ route($offre->exists ? 'Recrutement.offres.update' : 'Recrutement.offres.store', [$offre]) }}" method="post">

        @csrf
        @method($offre->exists ? 'put' : 'post')

        @include('shared.input', ['label' => 'Intitulé', 'name' => 'intitule', 'value' => $offre->intitule])
        @include('shared.input', ['label' => 'N° offre', 'name' => 'offre', 'value' => $offre->offre])
        @include('shared.input', ['label' => 'Période', 'name' => 'periode', 'value' => $offre->periode])
        @include('shared.input', ['label' => 'Mission', 'name' => 'mission', 'value' => $offre->mission])
        @include('shared.input', ['type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'value' => $offre->description])
        @include('shared.checkbox', ['name' => 'pourvue', 'label' => 'Pourvue', 'value' => $offre->pourvue])

        <div>
            <button class="btn btn-primary mt-2">
                @if($offre->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>
     <br>
@endsection
