<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Annee, Utilisateur, Inscrire};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class GestionEtudiant
{
	
	public function store($data)
	{
		$etudiant = Utilisateur::create([
			'uuid' => (string) Str::uuid(),
			'matricule' => $data->matricule,
			'nom' => $data->nom, 
			'prenom' => $data->prenom, 
			'telephone' => $data->telephone,
			'email' => $data->email,
			'password' => Hash::make($data->password), 
			'type' => 4
		]);

		Inscrire::create([
			'id_annee' => Annee::orderBy('id_annee', 'DESC')->first()->id_annee, 
			'id_utilisateur' => $etudiant->id_utilisateur, 
			'id_licence' => $data->licence, 
			'date_inscription' => date('Y-m-d')
		]);

		return trans('Etudiant creer avec success');
	}

	public function update($data, $key)
	{
		$etudiant = Utilisateur::find($key);

		$etudiant->update([
			'matricule' => $data->matricule,
			'nom' => $data->nom, 
			'prenom' => $data->prenom,
			'email' => $data->email,
			'telephone' => $data->telephone
		]);

		$inscrire = $etudiant->inscrires()->orderBy('id_annee', 'DESC')->first();
		$r = $inscrire->update([
			'id_licence' => $data->licence
		]);

		return trans('Inscription modifier avec success');
	}

	public function delete($key)
	{
		Utilisateur::find($key)->delete();
		return response()->json(['statut' => true]);
	}
}

?>