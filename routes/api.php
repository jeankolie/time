<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\{Categorie, Produit, Utilisateur};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//telephone
Route::post('/signup/step/1', function(Request $request) {

	$code = generate_code(4);

   	Utilisateur::firstOrCreate([
   		'telephone' => $request->telephone
   	])->update([
   		'code_sms' => $code
   	]);

   	return response()->json([
	    'statut' => true,
	    'user' => Utilisateur::whereTelephone($request->telephone)->first()
	]);
});

//telephone, code
Route::post('/signup/step/2', function(Request $request) {

   	$user = Utilisateur::whereTelephone($request->telephone)
   	->where('code_sms', $request->code);

   	$statut = false;

   	if ($user->exists()) {
   		$user = $user->first();
   		$user->update(['code_sms' => null]);
   		$statut = true;
   	}

   	return response()->json([
		'statut' => $statut,
		'user' => $user,
	]);  	
});

//telephone, nom
Route::post('/signup/step/3', function(Request $request) {

   	$user = Utilisateur::firstOrCreate([
   		'telephone' => $request->telephone
   	]);

   	$token = Str::random(80);

   	$user->forceFill([
        'api_token' => hash('sha256', $token),
        'nom' => $request->nom
    ])->save();

   	return response()->json([
		'statut' => true,
		'user' => $user,
		'token' => $token
	]);  	
});

Route::get('/categories', function(Request $request) {
	return response()->json([
		'statut' => true,
		'categories' => Categorie::get()
	]);
});

Route::get('/produits/jour', function(Request $request) {
	return response()->json([
		'statut' => true,
		'produits' => Produit::paginate(10)
	]);
});

Route::get('/categorie/{categorie}', function(Request $request, $categorie) {
	return response()->json([
		'statut' => true,
		'produits' => Categorie::find($categorie)->produits()->paginate(10)
	]);
});

Route::middleware(['auth:api'])->group(function () {

	Route::get('/user', function(Request $request) {
	   	return $request->user();
	});

	Route::get('/produits/{categorie}', function(Request $request, $categorie) {
	   	return Categorie::find($categorie)->produits;
	});

	Route::get('/produit/{produit}', function(Request $request, $produit) {
	   	return Produit::find($produit);
	});

	
});

//inscription: /api/signup
//verify phone: /api/verify/phone/code

//categories: /api/categories
//categorie: /api/catgorie/slug
//produits: /api/produits
//produit: /api/produit/slug
//images produit: /api/produit/slug/images

//add to cart: /api/buy/produit
//adresses: /api/adresses
