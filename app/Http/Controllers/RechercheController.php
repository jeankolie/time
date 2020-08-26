<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Annee, Utilisateur};
use App\Http\Requests\AnneeCreateRequest;
use App\Gestion\GestionAnnee;


class RechercheController extends Controller
{
    public function recherche(Request $request)
    {
    	$terme = $request->terme;

    	$users = Utilisateur::where('nom', 'LIKE', "$terme%")
    	->OrWhere('prenom', 'LIKE', "$terme%")
    	->OrWhere('matricule', 'LIKE', "$terme%")
    	->OrWhere('telephone', 'LIKE', "$terme%")
    	->OrWhere('email', 'LIKE', "$terme%")->get();

    	return view('backend.forms.recherche.resultat', [
            'users' => $users
        ]);
    }
}
