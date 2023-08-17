<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\BlogFormPostRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;

class BlogController extends Controller
{

    // Affiche le formulaire de création d'un nouvel article de blog avec les tags disponibles.
    public function create()
    {
        $post = new Post();
        return view('Blog.create', [
            'post' => $post,
            'tags' => Tag::select('name')->get()
        ]);
    }



    // Enregistre un nouvel article de blog en vérifiant les données du formulaire.
    // Sauvegarde une éventuelle image soumise et associe les tags existants ou crée de nouveaux tags.
    // Redirige vers la page de l'article créé avec un message de succès.
    public function store(BlogFormPostRequest $request)
    {
        // Vérifier si une image a été soumise et la sauvegarder si nécessaire
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
        }

        $validatedData = $request->validated();
        $validatedData['image'] = $imagePath;

        // Créer le post
        $post = Post::create($validatedData);

        // Attacher les tags existants
        if($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        // Créer et attacher de nouveaux tags s'ils ont été fournis
        if($request->has('new_tags')) {
            $newTags = explode(',', $request->new_tags);
            foreach ($newTags as $tagName) {
                $tagName = trim($tagName);
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $post->tags()->attach($tag->id);
            }
        }

        return redirect()
            ->route('Blog.show', ['slug' => $post->slug, 'post' => $post->id])
            ->with('success', "L'article a bien été sauvegardé");
    }




    // Affiche le formulaire d'édition d'un article de blog existant avec les tags disponibles.
    public function edit(Post $post)
    {
        return view('Blog.edit', [
            'post' => $post,
            'tags' => Tag::select('id', 'name')->get()
        ]);
    }




    // Extrait les données validées du formulaire de mise à jour d'un article de blog.
    // Si une nouvelle image est soumise, la sauvegarde et met à jour le chemin de l'image.
    public function extractData(Post $post, BlogFormPostRequest $request): array
    {
        $data = $request->validated();

        /** @var UploadedFile|null $image */
        $image = $request->file('image');
        if ($image === null || $image->getError()) {
            return $data;
        }
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Notez que nous ajoutons 'images/' au début du chemin
        $data['image'] = 'images/' . $image->store('images', 'public');

        return $data;
    }



    // Met à jour un article de blog existant en vérifiant les données du formulaire.
    // Si une nouvelle image est soumise, la sauvegarde et met à jour le chemin de l'image.
    // Associe les tags existants et crée de nouveaux tags.
    // Redirige vers la page de l'article modifié avec un message de succès.
    public function update(Post $post, BlogFormPostRequest $request)
    {
        $validatedData = $request->validated();

        // Vérifier si une nouvelle image a été soumise et la sauvegarder si nécessaire
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($post->image) {
                Storage::delete($post->image);
            }

            $imagePath = $request->file('image')->store('public/images');

            $validatedData['image'] = $imagePath;
        }

        // Mise à jour de la publication
        $post->update($validatedData);

        // Créer une liste vide pour les ID de tags
        $tagIds = [];

        // Diviser la chaîne de tags en une liste de noms de tags
        $tagNames = explode(',', $request->new_tags);

        foreach ($tagNames as $tagName) {
            // Enlever les espaces du nom du tag
            $tagName = trim($tagName);

            // Continuer si le nom du tag est vide
            if (empty($tagName)) continue;

            // Trouver le tag par son nom, ou créer un nouveau s'il n'existe pas
            $tag = Tag::firstOrCreate(['name' => $tagName]);

            // Ajouter l'ID du tag à la liste
            $tagIds[] = $tag->id;
        }

        // Synchroniser les tags avec la liste d'ID de tags
        $post->tags()->sync($tagIds);

        return redirect()->route('Blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article a bien été modifié");
    }





    // Affiche la liste des articles de blog avec pagination.
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('Blog.index', ['posts' => $posts]);
        $posts = Post::with('tags')->orderBy('created_at', 'desc')->paginate(5);
        $tags = Tag::all();
        return view('Blog.index', compact('posts', 'tags'));
    }




    // Affiche un article de blog spécifique en utilisant le slug et l'ID.
    public function show(string $slug, post $post): RedirectResponse | View
    {
        if ($post->slug !== $slug) {
            return redirect()->route('Blog.show', ['slug' => $post->slug, 'id' => $post->id,]);
        }
        return view('Blog.show', ['post' => $post]);
    }



    // Affiche un article de blog spécifique en utilisant le slug et l'ID.
    public function showed(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'title' => $post->title,
        ]);
    }



    // Supprime un article de blog existant.
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('Blog.index')->with('success', "L'article a bien été supprimé");
    }



    // Affiche les articles de blog associés à un tag spécifique.
    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(5);
        return view('blog.tag', compact('tag', 'posts'));
    }
}
