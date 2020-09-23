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

		$email = $data->email;
		$telephone = $data->telephone;

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

		$message = "Vos identifiants sont: Login: $email ou $telephone et Mot de passe: $otp";

		send_sms($message, $telephone);

		Mail::to($user->email)->send(new CreateUser($user, $message));

		return trans("Professeur enregistrer avvec success");
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