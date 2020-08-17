<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
    	if (Auth::user()->type == 4) {
    		$inscription = Auth::user()->inscrires()->orderBy('id_annee', 'DESC')->first();
    		return view('backend.forms.etudiant.emploi', [
    			'licence' => $inscription->licence
    		]);
    	} else {
    		return view('backend.home');
    	}
    }
}
