<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Annee, Enseigner, Semestre};
use Illuminate\Support\Str;


class GestionEmploi
{
	
	public function store($data)
	{
		$emploi = Enseigner::firstOrCreate([
			'id_semestre' => $data->semestre, 
			'id_annee' => Annee::orderBy('id_annee', 'DESC')->first()->id_annee, 
			'jour' => $data->jour, 
			'interval' => $data->horaire, 
		]);

		$emploi->update([
			'id_utilisateur' => $data->professeur,
			'id_matiere' => $data->matiere,
			'id_salle' => $data->salle
		]);

		return trans('Emplois creer avec success');
	}

	public function delete($data)
	{
		Semestre::find($data->semestre)
		->enseigners()->whereJour($data->jours)->whereInterval($data->interval)->delete();
		return response()->json(['statut' => true]);
	}
}

?>