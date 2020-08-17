<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Annee};
use Illuminate\Support\Str;


class GestionAnnee
{
	
	public function store($data)
	{
		
		Annee::create([
			'nom' => $data->nom,
			'slug' => Str::slug($data->nom)
		]);

		return trans('Annee creer avec success');
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
		Annee::whereSlug($key)->delete();
		return response()->json(['statut' => true]);
	}
}

?>