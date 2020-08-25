<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\Utilisateur as Professeur;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class GestionProfesseur
{
	
	public function store($data)
	{
		$otp = generate_code(5);

		$departement = Auth::user()->departement->id_departement;

		Professeur::create([
			'uuid' => (string) Str::uuid(),
			'nom' => $data->nom, 
			'prenom' => $data->prenom, 
			'telephone' => $data->telephone, 
			'email' => $data->email, 
			'password' => Hash::make($otp), 
			'type' => 3,
			'id_departement' => $departement
		]);

		return trans("Professeur enregistrer avvec success: $otp");
	}

	public function update($data, $key)
	{
		
	}

	public function delete($key)
	{
		Professeur::find($key)->delete();
		return response()->json(['statut' => true]);
	}
}

?>