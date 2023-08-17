@extends('base')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid d-flex align-items-center justify-content-center bg-cover vh-100" alt="paysage_image" style="background-image: url('../images/Newsletter.jpg');">
    <div class="border border-2 border-white bg-transparent rounded p-5" style="max-width: 800px;">
        <div class="border border-2 border-white rounded p-4 mb-4">
            <h2 class="text-center fw-bold mb-4 h3">Rejoignez notre communauté en vous inscrivant à notre newsletter et soyez informés de nos futurs projets, initiatives et opportunités de collaboration</h2>
        </div>
        <form action="{{ route('newsletter.store') }}" method="POST" class="border border-2 border-white rounded p-4 mb-4">
            @csrf
            <div class="input-group">
                <input type="email" name="email" id="email" required class="form-control" placeholder="Entrez votre adresse email">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-dark h6">S'abonner</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
