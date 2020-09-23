<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Annee, Utilisateur, Inscrire};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\CreateUser;
use Illuminate\Support\Facades\Mail;

class GestionEtudiant
{
	
	public function store($data)
	{
		$password = $data->password;
		$email = $data->email;
		$telephone = $data->telephone;
		
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

		$message = "Vos identifiants sont: Login: $email ou $telephone et Mot de passe:$password";

		send_sms($message, $telephone);

		Mail::to($etudiant->email)->send(new CreateUser($etudiant, $message));

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
		Utilisateur::whereUuid($key)->delete();
		return response()->json(['statut' => true]);
	}
}

?>