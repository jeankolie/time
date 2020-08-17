<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Salle};
use Illuminate\Support\Str;


class GestionSalle
{
	
	public function store($data)
	{
		
		Salle::create([
			'nom' => $data->nom,
			'capacite' => $data->capacite,
			'slug' => Str::slug($data->nom)
		]);

		return trans('Salle creer avec success');
	}

	public function update($data, $key)
	{
		$salle = Salle::find($key);

		$salle->update([
			'nom' => $data->nom,
			'capacite' => $data->capacite,
			'slug' => Str::slug($data->nom)
		]);

		return $salle;
	}

	public function delete($key)
	{
		Salle::whereSlug($key)->delete();
		return response()->json(['statut' => true]);
	}
}

?>