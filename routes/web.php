<?php

use App\Http\Controllers\adherantController;
use App\Http\Controllers\ArrondissementController;
use App\Http\Controllers\AutreController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiasporaController;
use App\Http\Controllers\InscrireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuartierController;
use App\Http\Controllers\TitreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AutreController::class, 'welcome'])->name('welcome');
Route::get('/contact-us', [AutreController::class, 'contactIndex'])->name('contact');



Route::get('/dashboard', [AutreController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('adherant',adherantController::class );
    Route::resource('titre',TitreController::class );
    Route::resource('users-profile', adherantController::class)->only(['show']);
    
    Route::get('/diaspora-pdf', [DiasporaController::class, 'diasporaPDF'])->name('diaspora.pdf');
    Route::get('/generate-pdf', [adherantController::class, 'generatePDF'])->name('generate.pdf');
    Route::resource('diaspora',DiasporaController::class );
    
    Route::get('/get-communes/{departementId}/', [CommuneController::class, 'getCommunes'])->name('get-communes');
    Route::get('/get-arrondissements/{communeId}/', [ArrondissementController::class, 'getArrondissements'])->name('get-arrondissements');
    Route::get('/get-quartiers/{arrondissementId}/', [QuartierController::class, 'getQuartiers'])->name('get-quartiers');
    Route::get('/adherants/filter/', [adherantController::class, 'filter'])->name('filter-adherants');
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); /*les utilisateurs connecter*/



/* les utilisateur nom connecter*/
    Route::get('/creer-admin', [UserController::class, 'createAdminAccount']);
    
    Route::resource('diaspora',DiasporaController::class );

    // Route::post('/inscrire', [InscrireController::class, 'store'])->name('inscription.store');
    // Route::get('/welcome', [InscrireController::class, 'index'])->name('welcome');
    
    Route::resource('inscrire', InscrireController::class)->only([
        'index', 'store', 'create', 'update', 'edit', 'search'
    ]);

    // Route::resource('contact', ContactController::class );

    Route::get('/get-communes/{departementId}/', [CommuneController::class, 'getCommunes'])->name('get-communes');
    Route::get('/get-arrondissements/{communeId}/', [ArrondissementController::class, 'getArrondissements'])->name('get-arrondissements');
    Route::get('/get-quartiers/{arrondissementId}/', [QuartierController::class, 'getQuartiers'])->name('get-quartiers');


    Route::get('/adherants/filter/', [adherantController::class, 'filter'])->name('filter-adherants');

    require __DIR__.'/auth.php';
