<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Departement, Licence, Semestre, Associer};
use Illuminate\Support\Str;


class GestionDepartement
{
	
	public function store($data)
	{
		$dep = Departement::create([
			'nom' => $data->nom,
			'id_utilisateur' => $data->responsable,
			'slug' => Str::slug($data->nom)
		]);

		for ($i=0; $i < $data->licence; $i++) { 
			$ordre = $i+1;

			$licence = $this->createLincence($dep, $ordre);
			$this->createSemestre($licence, $ordre);
			$this->createSemestre($licence, $ordre+1);
		}

		if ($data->has('matiere')) {
			foreach ($data->matiere as $key => $matiere) {
				Associer::create([
					'id_matiere' => $matiere,
					'id_departement' => $dep->id_departement
				]);
			}
		}

		return trans('Departement creer avec success');
	}

	public function update($data, $key)
	{
		$departement = Departement::find($key);

		$departement->update([
			'nom' => $data->nom,
			'id_utilisateur' => $data->responsable,
			'slug' => Str::slug($data->nom)
		]);

		$old = $departement->licences->count();

		for ($i=0; $i < $data->licence; $i++) { 
			$ordre = $i+1;

			$licence = $this->createLincence($departement, $ordre);
			$this->createSemestre($licence, $ordre);
			$this->createSemestre($licence, $ordre+1);
		}

		$new = $data->licence;

		if ($old > $new) {
			while ($old > $new) {
				$departement->licences()->whereNom("Licence $old")->delete();
				$old--;
			}
		}

		if ($data->has('matiere')) {
			foreach ($data->matiere as $key => $matiere) {
				Associer::create([
					'id_matiere' => $matiere,
					'id_departement' => $departement->id_departement
				]);
			}
		}

		return $departement;
	}

	public function delete($key)
	{
		Departement::whereSlug($key)->delete();
		return response()->json(['statut' => true, 'departement' => true]);
	}

	public function createLincence($dep, $ordre)
	{
		return Licence::firstOrCreate([
			'nom' => "Licence $ordre",
			'ordre' => $ordre,
			'slug' => Str::slug("Licence $ordre"),
			'id_departement' => $dep->id_departement
		]);
	}

	public function createSemestre($licence, $ordre)
	{
		return Semestre::firstOrCreate([
			'nom' => "Semestre $ordre",
			'slug' => Str::slug("Semestre $ordre"),
			'id_licence' => $licence->id_licence
		]);
	}
}

?>