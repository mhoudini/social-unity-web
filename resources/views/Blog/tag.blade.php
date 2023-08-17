@extends('base')

@section('title',"" . $tag->name)

@section('content')
<div class="container">
    <h1 class="text-center my-5">#{{ $tag->name }} </h1>
    <div class="d-flex justify-content-left">
        <a href="{{ route('Blog.index') }}" class="btn btn-primary mb-3">Retour</a>
    </div>

    @foreach($posts as $post)
    <div class="card mb-4">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-9">
                    <h2 class="card-title text-center">{{ $post->title }}</h2>
                    <p class="card-text text-center"><small class="text-muted">{{ $post->created_at->format('d/m/Y') }}</small></p>
                    @if($post->image)
                    <div class="d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-100">
                    </div>
                    @endif
                    <br><br>
                    @foreach($post->tags as $tag)
                    <a href="{{ route('Blog.tag', ['tag' => $tag->id]) }}" class="btn btn-outline-dark rounded-pill btn-sm">{{ $tag->name }}</a>
                    @endforeach
                    <br> <br>
                    <p class="card-text text-center">{{ Str::limit($post->content, 200) }}</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('Blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}" class="btn btn-primary">Lire la suite</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <div class="d-flex justify-content-center">
        {{ $posts->links  ('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
