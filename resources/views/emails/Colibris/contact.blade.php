<x-mail::message>
    <a href="{{ route('contact.submit') }}">Retourner au formulaire de contact</a>
    <h1>Formulaire de contact</h1>
    <p>Vous avez une nouvelle demande de contact de la part de {{ $data['nom_structure'] }} :</p>
    <ul>
        <li>Nom de la structure : {{ $data['nom_structure'] }}</li>
        <li>Email : {{ $data['email'] }}</li>
        <li>Téléphone : {{ $data['tel'] }}</li>
        <li>Profil : {{ $data['profil'] }}</li>
        <li>Période : {{ $data['periode'] }}</li>
        <li>Budget : {{ $data['budget'] }}</li>
        <li>Problématique : {{ $data['problematique'] }}</li>
        <li>Objectif : {{ $data['objectif'] }}</li>
    </ul>
    <p>
        <a href="mailto:{{ $data['email'] }}">Répondre</a>
    </p>
</x-mail::message>
