<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Matiere, Utilisateur};
use App\Http\Requests\MatiereCreateRequest;
use App\Gestion\GestionMatiere;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function reset($user = '')
    {
        $user = Utilisateur::whereUuid($user);
        if ($user->exists()) {

        	$otp = generate_code(5);

        	$user->first()->update([
        		'password' => Hash::make($otp), 
        	]);

        	return back()->with('info', "Mot de passe renitialiser avec succes $otp");
        }else{
        	return back();
        }
    }
}
