<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Annee, Utilisateur};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\CreateUser;
use Illuminate\Support\Facades\Mail;

class GestionPersonnel
{
	
	public function store($data)
	{
		$otp = generate_code(5);

		$email = $data->email;
		$telephone = $data->telephone;

		$user = Utilisateur::create([
			'uuid' => (string) Str::uuid(),
			'nom' => $data->nom, 
			'prenom' => $data->prenom, 
			'telephone' => $data->telephone, 
			'email' => $data->email, 
			'password' => Hash::make($otp), 
			'type' => 2,
			'id_departement' => $data->departement
		]);

		$message = "Vos identifiants sont: Login: $email ou $telephone et Mot de passe: $otp";

		send_sms($message, $telephone);

		Mail::to($user->email)->send(new CreateUser($user, $message));

		return trans("Utilisateur creer avec success");
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
		$user = Utilisateur::find($key);
		if ($user->type != 4 AND $user->isChef()) {
			return response()->json(['statut' => false, 'message' => 'Vous ne pouvez supprimer un chef de departement avant de le remplacer']);
		}
		$user->delete();
		return response()->json(['statut' => true]);
	}
}

?>