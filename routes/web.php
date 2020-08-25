<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\{Categorie, Produit, Licence, Enseigner, Annee};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/semestres/licence', function(Request $request) {
    if ($request->licence) {
        return Licence::find($request->licence)->semestres;
    } else {
        return [];
    }
});

Route::get('/disponibilite', function(Request $request) {

    $statut = false;
    $message = '';
    $annee = Annee::orderBy('id_annee', 'DESC')->first();

    $salle = Enseigner::where('id_salle', $request->salle)
    ->where('id_annee', $annee->id_annee)
    ->where('jour', $request->jour)
    ->where('interval', $request->horaire);

    $professeur = Enseigner::where('id_utilisateur', $request->professeur)
    ->where('id_annee', $annee->id_annee)
    ->where('jour', $request->jour)
    ->where('interval', $request->horaire);

    if ($salle->count()) {
        $statut = true;
        $emp = $salle->first();

        $message = trans("Desoler cette salle est occuper le :jour de :heure par :prof", [
            'jour' => $emp->jour,
            'heure' => $emp->interval,
            'prof' => $emp->utilisateur->nomComplet()
        ]);
    }elseif ($professeur->count()) {
        $statut = true;
        $emp = $professeur->first();

        $message = trans("Desoler cet professeur est programmer le :jour de :heure dans la salle :salle", [
            'jour' => $emp->jour,
            'heure' => $emp->interval,
            'salle' => $emp->salle->nom
        ]);
    }

    return response()->json([
        'statut' => $statut,
        'message' => $message
    ]);
});

Route::middleware(['auth'])->group(function () {

    Route::middleware(['admin'])->group(function() {
        Route::resource('annees', 'AnneeController');
        
    });

    Route::resource('departements', 'DepartementController');
    Route::resource('utilisateurs', 'UtilisateurController');
    Route::resource('matieres', 'MatiereController');
        Route::resource('salles', 'SalleController');

    Route::middleware(['personnel'])->group(function() {
        
        Route::resource('etudiants', 'EtudiantController');
        Route::get('/etudiants/{annee}', 'EtudiantController@index');
        Route::resource('emplois', 'EmploiController');
        Route::get('/emplois/{departement}/{licence}/{semestre}', 'EmploiController@index');

        Route::post('/import/eleve', 'ImportController@eleve');
    });

    Route::get('/home', 'HomeController@home');
    Route::get('/', 'HomeController@home');    
});

Route::get('/models', function () {
        foreach (models() as $key => $table) {

            $models = Str::studly($table);

            Artisan::call('krlove:generate:model', [
                '--table-name' => $table,
                'class-name' => $models
            ]);

            // Artisan::call('make:controller', [
            //     '--resource' => true,
            //     'name' => $models."Controller"
            // ]);

            // Artisan::call('make:request', [
            //     'name' => $models."CreateRequest"
            // ]);
        }
            
    });

    Route::get('/migrations', function () {
        foreach (models() as $table) {

            $models = Str::studly($table);

            Artisan::call('make:migration', [
                '--create' => $table,
                'name' => "create_".$table."_table"
            ]);

            sleep(2);
        }
            
    });
