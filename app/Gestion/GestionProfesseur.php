<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\CreateUser;
use Illuminate\Support\Facades\Mail;


class GestionProfesseur
{
	
	public function store($data)
	{
		$otp = generate_code(5);

		$departement = Auth::user()->departement->id_departement;

		$user = Utilisateur::create([
			'uuid' => (string) Str::uuid(),
			'nom' => $data->nom, 
			'prenom' => $data->prenom, 
			'telephone' => $data->telephone, 
			'email' => $data->email, 
			'password' => Hash::make($otp), 
			'type' => 3,
			'id_departement' => $departement
		]);

		$message = "$otp";

		Mail::to($user->email)->send(new CreateUser($user, $message));

		return trans("Professeur enregistrer avvec success: $otp");
	}

	public function update($data, $key)
	{
		
	}

	public function delete($key)
	{
		Utilisateur::find($key)->delete();
		return response()->json(['statut' => true]);
	}
}

?>