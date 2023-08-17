<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form action="" method="POST" class="vstack gap-2" enctype="multipart/form-data">
                        @csrf
                        @method( $post->id ? 'PATCH': 'POST')

                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $post->title) }}" placeholder="Entrez le titre de votre article" required>
                            @error("title")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" placeholder="Entrez votre slug (titre) qui sera utilisé comme une partie de votre URL" required>
                            @error('slug')
                            <div class="alert alert-danger">
                                @if ($errors->has('slug.unique'))
                                    Le slug est déjà utilisé. Veuillez en choisir un autre.
                                @elseif ($errors->has('slug.regex'))
                                    Le slug ne doit contenir que des lettres minuscules, des chiffres et des tirets.
                                @else
                                    {{ $message }}
                                @endif
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_tags">Tags</label>
                            <input type="text" class="form-control" name="new_tags" id="new_tags" value="{{ old('new_tags', $post->tags->pluck('name')->implode(', ')) }}" placeholder="Entrez les nouveaux tags séparés par des virgules">
                            @error('new_tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                            @error("image")
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Contenu</label>
                            <textarea name="content" class="form-control" rows="13" required>{{ old('content', $post->content) }}</textarea>
                            @error("content")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            @if ($post->id)
                                Modifier
                            @else
                                Publier
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
