<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Annee, Utilisateur};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class GestionProfil
{
	
	public function store($data)
	{
		Auth::user()->update([
			'nom' => $data->nom, 
			'prenom' => $data->prenom, 
			'telephone' => $data->telephone, 
			'email' => $data->email
		]);

		return trans('Compte modifier avec success');
	}

	public function updatePassword($data)
	{

		Auth::user()->update([
			'password' => Hash::make($data->password)
		]);

		return trans('Compte modifier avec success');
	}
}

?>