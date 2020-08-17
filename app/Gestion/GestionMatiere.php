<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Matiere, Associer};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class GestionMatiere
{
	
	public function store($data)
	{
		
		$matiere = Matiere::firstOrCreate([
			'nom' => $data->nom,
			'slug' => Str::slug($data->nom)
		]);


		if (!Auth::user()->isAdmin()) {
			$dep = Auth::user()->departement->id_departement;
			Associer::create([
				'id_matiere' => $matiere->id_matiere,
				'id_departement' => $dep
			]);
		}

		return trans('Matiere creer avec success');
	}

	public function update($data, $key)
	{
		$annee = Matiere::find($key);

		$annee->update([
			'nom' => $data->nom,
			'slug' => Str::slug($data->nom)
		]);

		return $annee;
	}

	public function delete($key)
	{
		$matiere = Matiere::whereSlug($key)->first();

		if (!Auth::user()->isAdmin()) {
			Associer::where('id_matiere', $matiere->id_matiere)
			->where('id_departement', Auth::user()->departement->id_departement)->delete();
		}else{
			$matiere->delete();
		}
		
		return response()->json(['statut' => true]);
	}
}

?>