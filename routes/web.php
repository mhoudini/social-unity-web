<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ConfidentialitéController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\NewsletterController;

use Illuminate\Support\Facades\Route;


// Les routes pour la gestion de l'authentification
Route::get('/login', [AuthController::class, 'login'])->name('auth.login'); // Affiche le formulaire de connexion
Route::post('/login', [AuthController::class, 'doLogin']); // Gère la soumission du formulaire de connexion
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout'); // Gère la déconnexion

// Affiche la page d'accueil
Route::view('/', 'home')->name('home');

// Affiche la page "Mission"
Route::get('/mission', [MissionController::class, 'mission'])->name('mission');

// Groupe de routes pour le blog
Route::prefix('/Blog')->name('Blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index'); // Affiche la liste des articles du blog
    Route::get('/new', [BlogController::class, 'create'])->name('create')->middleware('auth'); // Affiche le formulaire pour créer un nouvel article
    Route::post('/new', [BlogController::class, 'store']); // Gère la soumission du formulaire pour créer un nouvel article
    Route::delete('/{post}', [BlogController::class, 'destroy'])->name('destroy')->middleware('auth'); // Supprime un article
    Route::get('/{post}/edit', [BlogController::class, 'edit'])->name('edit')->middleware('auth'); // Affiche le formulaire pour éditer un article
    Route::patch('/{post}/edit', [BlogController::class, 'update'])->name('update')->middleware('auth'); // Gère la soumission du formulaire pour éditer un article
    Route::get('/{slug}-{post}', [BlogController::class, 'show'])->where([ // Affiche un article spécifique
        'post' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
    ])->name('show');
    Route::get('/tags/{tag}', [BlogController::class, 'tag'])->name('tag'); // Affiche les articles ayant un certain tag
});

// Groupe de routes pour le recrutement
Route::prefix('Recrutement')->name('Recrutement.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('offres/create', [\App\Http\Controllers\Recrutement\OffreEmploiController::class, 'create'])->name('offres.create');
        Route::post('offres', [\App\Http\Controllers\Recrutement\OffreEmploiController::class, 'store'])->name('offres.store');
        Route::get('offres/{offre}/edit', [\App\Http\Controllers\Recrutement\OffreEmploiController::class, 'edit'])->name('offres.edit');
        Route::put('offres/{offre}', [\App\Http\Controllers\Recrutement\OffreEmploiController::class, 'update'])->name('offres.update');
        Route::delete('offres/{offre}', [\App\Http\Controllers\Recrutement\OffreEmploiController::class, 'destroy'])->name('offres.destroy');
    });
    Route::get('offres', [\App\Http\Controllers\Recrutement\OffreEmploiController::class, 'index'])->name('offres.index');
});

// Affiche la page "Don"
Route::view('/don', 'don')->name('don');
Route::get('/don', [DonController::class, 'don'])->name('don');

// Gère le formulaire de contact
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.show'); // Affiche le formulaire de contact
Route::post('/contact', [ContactController::class, 'contact'])->name('contact.submit'); // Gère la soumission du formulaire de contact

// Affiche la page "Confidentialité"
Route::get('confidentialité', [ConfidentialitéController::class, 'confidentialité'])->name('confidentialité');

// Gère les abonnements à la newsletter
Route::get('/subscribe', [NewsletterController::class, 'createSubscriber'])->name('newsletter.subscribe'); // Affiche le formulaire d'abonnement à la newsletter
Route::post('/subscribe', [NewsletterController::class, 'storeSubscriber'])->name('newsletter.store'); // Gère la soumission du formulaire d'abonnement à la newsletter
Route::post('/send-newsletter', [NewsletterController::class, 'sendNewsletter'])->name('newsletter.send'); // Gère l'envoi de la newsletter
