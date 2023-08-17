@extends('base')

@section('head')

    <meta name="description" content="Les Colibris est une association basée à Marseille, dédiée à la santé et au social, qui soutient les adultes handicapés et la petite enfance.">
@endsection

@section('title', 'Accueil')

@section('content')
<br>
<div class="container bg-white shadow-sm p-4 m-auto" style="max-width: 90vw;">
    <img src="{{ asset('images/ActionInsertionImage.jpg') }}" alt="Les Colibris" class="img-fluid d-block mx-auto" style="width: 40%;" />

    <div class="fs-5 lh-lg mt-4">

        <h1 class="fs-1">{{ __('Bienvenue sur notre site') }}</h1>

        <p>Les Colibris est une association régie par la loi du 1<sup>er</sup> juillet 1901, dédiée à l'organisation de séjours de vacances, de repli et de rupture pour les enfants relevant de dispositifs de protection de l'enfance, ainsi que les adultes en situation de handicap. Nous sommes fiers de jouer un rôle important dans l'amélioration de la qualité de vie de ces personnes, en leur offrant des expériences inoubliables.</p>

        <p>Nous sommes conscients de l'importance de nos services pour les personnes que nous aidons. C'est pourquoi nous travaillons avec des professionnels qualifiés et passionnés pour offrir des programmes de qualité qui répondent aux besoins individuels de chacun. Nous sommes également attachés à l'inclusion sociale et travaillons à offrir des expériences enrichissantes pour tous les membres de notre communauté.</p>

        <p>Nous sommes fiers de partager notre mission avec vous et espérons que vous trouverez toutes les informations nécessaires sur notre site Web pour mieux comprendre notre travail. Nous sommes également disponibles pour répondre à toutes vos questions et sommes impatients de travailler avec vous pour offrir nos services à ceux qui en ont besoin.</p>
    </div>
</div>
<br>
@endsection
