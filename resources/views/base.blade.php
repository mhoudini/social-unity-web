<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Les Colibris est une association basée à Marseille, dédiée à la santé et au social, qui soutient les adultes handicapés et la petite enfance.">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/LogoColibris.jpg') }}"  type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>

    @php
        $routeName = request()->route()->getName();
    @endphp

    <div class="text-center">
        <img src="{{ asset('images/LogoColibris.jpg') }}" alt="Logo Colibris" class="img-fluid" style="max-width:13vh" >
        <h1>LES COLIBRIS</h1>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mission') }}">Mission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Blog.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Recrutement.offres.index') }}">Recrutement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href="{{ route('don') }}">Don</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.show') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('newsletter.subscribe') }}">Newsletter</a>
                    </li>

                    @if(auth()->check())
                        <ul class="navbar-nav ms-auto mb-3 mb-lg-0">
                            <li class="nav-item">
                                <span class="nav-link fw-bold"> {{ auth()->user()->name }}</span>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield ('content')

    <footer class="bg-light text-center text-lg-start mt-auto">
        <div class="container p-1">
            <p>
                Association Les Colibris - Déclarée en préfecture du Rhône W134010473
                <a href="{{ route('confidentialité') }}" class="text-decoration-underline"> Mentions légales et politique de confidentialité </a>- © Tous droits réservés
            </p>
        </div>
    </footer>

</body>
</html>
