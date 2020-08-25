<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Salle};

class HomeController extends Controller
{
    public function home()
    {
        $salles = Salle::get();

    	if (Auth::user()->type == 4) {
    		$inscription = Auth::user()->inscrires()->orderBy('id_annee', 'DESC')->first();
    		return view('backend.forms.etudiant.emploi', [
    			'licence' => $inscription->licence,
                'salles' => $salles
    		]);
    	} else {
    		return view('backend.home', [
                'salles' => $salles
            ]);
    	}
    }
}
