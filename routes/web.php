<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\RecruteureController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ShowCandidateureController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SearchBarController;
use App\Http\Controllers\InfoCandidatController;
use App\Http\Controllers\ValideMailController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CardController;
use App\Models\Demand;
use App\Http\Controllers\ContactController;

use App\Models\Offre;
use App\Models\Chat;
use App\Mail\Email;
use App\Models\User;
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

Route::get('/test', function () {


    return view('test');
});


Route::get('/', function () {

    $cities = ['Rabat', 'Fes', 'Marrakech',
        'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
        'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
        'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
        'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
        'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen','casablanca'];
        $secteurs = [ '','Industrie métallurgique', 'Industrie minière', 'Industrie automobile',
        'Fabrication de machines, équipements, matériels', 'Industrie pétrolière / Pétrochimie', 'Franchise', 'Grande distribution', 'Immobilier',
        'Centres d appels', 'Comptabilité / Gestion / Audit', 'El Conseil / Consulting', 'Eau (production, distribution, traitement...)', 'Edition / Imprimerie / Reproduction',
        'Assurance', 'Audiovisuel / Presse', 'Agriculture / Chasse', 'Artisanat', 'Santé', 
        'Sports / Loisirs', 'Autres'];
    

    $contrats = ['CDD','CDI','STAGAIRE','FREELANCE'];
    

    $offres = Offre::orderBy('created_at', 'desc')->take(4)->get();
    $toute_offres = Offre::get();
    $societes = User::where('role_id','3')->take(6)->get();

    return view('welcome',compact('toute_offres','offres','societes','cities','contrats','secteurs'));
});

Auth::routes();

Route::resource('/home/packages/payment/{id}/card',CardController::class);
Route::resource('/home/packages/payment/delete',CardController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/profile_recruteure/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('home.show');


Route::get('registerr', [RegisterController::class,'showRegistrationForm1'])->name('registerr');
Route::get('register', [RegisterController::class,'showRegistrationForm2'])->name('register');


Route::resource('home/offre',OffreController::class);
Route::resource('home/offre/show_candidature',ShowCandidateureController::class);

Route::resource('home/demand',DemandController::class);
Route::resource('home/packages',PackageController::class);
Route::resource('home/packages/{id}/payment',PackageController::class);

Route::resource('home/offre/{id}/candidature',CandidatureController::class);

Route::resource('home/chat/{id}/send',ChatController::class);
Route::resource('home/chat',ChatController::class);

Route::resource('home/{id}/contact',ContactController::class);


Route::resource('home/profile_candidat',CandidatController::class);
Route::resource('home/profile_recruteure',RecruteureController::class);

Route::resource('home/deposer-mon-cv',InfoCandidatController::class);

Route::get('home/admin/collaboration', [AdminController::class,'colaboration'])->name('colaboration');
Route::get('home/admin/candidats', [AdminController::class,'index_candidats'])->name('candidat');
Route::get('home/admin/recruteurs', [AdminController::class,'index_recruteurs'])->name('recruteure');
Route::get('home/admin/demands', [AdminController::class,'demands'])->name('demands');
Route::get('home/admin/suspend/candidat', [AdminController::class,'suspend_candidat'])->name('suspend_candidat');
Route::get('home/admin/demands/recruteure', [AdminController::class,'suspend_recruteure'])->name('suspend_recruteure');



Route::get('home/admin/candidats/{id}', [AdminController::class,'show_candidat'])->name('show.candidat');
Route::get('home/admin/recruteurs/{id}', [AdminController::class,'show_recruteure'])->name('show.recruteure');


Route::get('home/admin/recruteurs/offres/{id}', [AdminController::class,'show_recruteure_offres'])->name('show.recruteure.offres');


Route::get('/sinscrire', function () {
    return view('sinscrire');
});

Route::get('home/offre/{id}/send', [MailController::class,'index']);
Route::get('/home/offre/show_candidature/{id}/send', [ValideMailController::class,'index']);



Route::post('/rechercher', [SearchBarController::class,'rechercher'])->name('rechercher');

Route::get('/suspend', function () {
    return view('account.suspend');
});


Route::get('home/{id}/cv', function ($id) {

    $user=User::where('id',$id)->first();
    $CV=$user->info;

    return view('dashboard.cv',compact('CV','id'));

})->name('cv.show');

Route::get('home/admin/etat_demande', function () {
    $demands=Demand::get();
    return view('admin.demand.etat_demand',compact('demands'));
})->name('etat_demand');

