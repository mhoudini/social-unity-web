@extends('base')

@section('title', 'Les Colibris - Don')

@section('content')

<div class="container bg-white shadow-sm my-5 p-5 mx-auto" style="max-width: 90vw;">

    <div class="my-5">
        <h1>{{ __('JE FAIS UN DON') }}</h1>
        <div class="my-4">
        <p> Certains projets des COLIBRIS nécessitent du financement pour être menés à bien :</p>
        <ul class="mb-4">
          <li>Vous pouvez déposer un don en précisant par mail quel projet vous souhaitez soutenir.</li>
        </ul>
        <p> Les dons aux COLIBRIS sont déductibles de vos impôts à hauteur de 66 % (dans la limite de 20 % de votre revenu imposable). </p>
        <p> Ainsi, un don de 50 € vous revient en fait à 17 €.</p>
      </div>

      <div class="my-4">
        <h2> Comment faire un don ? </h2>
        <p> Par chèque à l’ordre des COLIBRIS :</p>
        <p> adressé à : </p>
        <p> LES COLIBRIS </p>
        <p> 1 rue Jean Moulin 13500 Martigues </p>

        <p> Par virement bancaire :</p>

        <p> A réception, un reçu de don vous sera envoyé à votre adresse mail.</p>
      </div>

    </div>

    <div class="d-flex justify-content-center my-5">
      <img src="{{ asset('images/RIB.png') }}" alt="Les Colibris" class="img-fluid" style="width: 60%;" />
    </div>

</div>
@endsection
