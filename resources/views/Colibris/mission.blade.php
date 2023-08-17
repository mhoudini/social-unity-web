@extends('base')
@section('title', 'Les Colibris -  Missions')
@section('content')

<div class="container mx-auto my-1 p-2" style="max-width: 90vw;">
  <h1 class="text-center my-4">Nos Missions</h1>

  @php
      $missions = [
          ['Concevoir.jpg', "1. Concevoir des séjours de vacances, de repli et de rupture pour les enfants relevant de dispositifs de protection de l'enfance et les adultes en situation de handicap."],
          ['Cooperer.jpg', "2. Coopérer avec les professionnels encadrant les personnes accueillies pour identifier les besoins individuels de chacun et concevoir des programmes personnalisés."],
          ['Adapter.jpg', "3. Adapter les activités et les programmes en fonction des saisons et des conditions météorologiques pour garantir des expériences sûres et agréables pour tous."],
          ['Elaborer.jpg', "4. Elaborer une pédagogie basée sur l'éducation populaire, pour encourager l'apprentissage, la socialisation et l'épanouissement des personnes accueillies."],
          ['Planifier.png', "5. Planifier et organiser les activités pour chaque séjour, en veillant à équilibrer les temps de détente, de loisirs et d'apprentissage."],
          ['Rediger.png', "6. Rédiger un rapport journalier sur le déroulement du séjour, en y incluant des informations sur les activités, les échanges entre participants, les problématiques rencontrées et les solutions apportées."],
          ['Etablir.png', "7. Établir un rapport final sur le séjour, en y incluant une analyse des problématiques spécifiques rencontrées et du travail réalisé pour y répondre."],
          ['Favoriser.jpg', "8. Favoriser l'écoute et la participation active des personnes accueillies, en les impliquant dans la prise de décision relative au programme d'activités et en leur donnant la parole pour exprimer leurs besoins, leurs idées et leurs émotions."]
      ];
  @endphp

  <div class="d-grid gap-2 my-5" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
    @foreach ($missions as $mission)
      <div class="shadow-sm p-4 text-center bg-white">
        <img src="{{ asset('images/' . $mission[0]) }}" alt="{{ $mission[1] }}" class="img-fluid w-100" style="object-fit: cover;" />
        <p class="fs-5 mt-4" style="font-family: 'Georgia', serif; line-height: 1.6;">{{ $mission[1] }}</p>
      </div>
    @endforeach
  </div>
</div>

@endsection
