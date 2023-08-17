@extends('base')

@section('title',"" . $post->title)

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <div class="mb-3 text-start">
                        <a href="{{ route('Blog.index') }}" class="btn btn-primary">Retour</a>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        @auth
                        <a href="{{ route('Blog.edit', ['post' => $post->id]) }}" class="btn btn-primary me-2">Modifier</a>
                        @endauth

                        <form method="POST" action="{{ route('Blog.destroy', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            @auth
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                            @endauth

                        </form>
                    </div>
                    <article>
                        <h1>{{ $post->title }}</h1>
                        <p>{{ $post->created_at->format('d/m/Y') }}</p>
                        @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-100">
                        <br><br>
                        @endif
                        @foreach($post->tags as $tag)
                        <a href="{{ route('Blog.tag', ['tag' => $tag->id]) }}" class="btn btn-outline-dark rounded-pill btn-sm">{{ $tag->name }}</a>
                        @endforeach
                        <br><br>
                        <p>{{ $post->content }}</p>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
