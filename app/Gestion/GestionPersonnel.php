<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Annee, Utilisateur};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class GestionPersonnel
{
	
	public function store($data)
	{
		$otp = generate_code(5);


		Utilisateur::create([
			'uui' => (string) Str::uuid(),
			'nom' => $data->nom, 
			'prenom' => $data->prenom, 
			'telephone' => $data->telephone, 
			'email' => $data->email, 
			'password' => Hash::make($otp), 
			'type' => 2,
			'id_departement' => $data->departement
		]);

		return trans("Utilisateur creer avec success: opt: $otp");
	}

	public function update($data, $key)
	{
		$annee = Annee::find($key);

		$annee->update([
			'nom' => $data->nom,
			'slug' => Str::slug($data->nom)
		]);

		return $annee;
	}

	public function delete($key)
	{
		Utilisateur::find($key)->delete();
		return response()->json(['statut' => true]);
	}
}

?>