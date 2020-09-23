<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Departement, Licence, Semestre, Associer, Utilisateur};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class GestionDepartement
{
	
	public function store($data)
	{
		$dep = Departement::create([
			'nom' => $data->nom,
			'id_utilisateur' => $data->responsable,
			'slug' => Str::slug($data->nom)
		]);

		Utilisateur::find($data->responsable)->update([
			'id_departement' => $dep->id_departement
		]);

		for ($i=0; $i < $data->licence; $i++) { 
			$ordre = $i+1;

			$licence = $this->createLincence($dep, $ordre);
			$this->createSemestre($licence, $ordre);
			$this->createSemestre($licence, $ordre+1);
		}

		if ($data->has('matiere')) {
			foreach ($data->matiere as $key => $matiere) {
				Associer::firstOrCreate([
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

		Utilisateur::find($data->responsable)->update([
			'id_departement' => $departement->id_departement
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
				$departement->licences()->whereNom("Niveau $old")->delete();
				$old--;
			}
		}

		Associer::where('id_departement', $departement->id_departement)->delete();

		if ($data->has('matiere')) {

			foreach ($data->matiere as $key => $matiere) {
				Associer::firstOrCreate([
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
			'nom' => "Niveau $ordre",
			'ordre' => $ordre,
			'slug' => Str::slug("Niveau $ordre"),
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

	public function setImportSettings($data)
	{
		$settings = collect([
			'nom' => ($data->has('nom')) ? $data->nom:'',
			'prenom' => ($data->has('prenom')) ? $data->prenom:'',
			'telephone' => ($data->has('telephone')) ? $data->telephone:'',
			'matricule' => ($data->has('matricule')) ? $data->matricule:'',
			'email' => ($data->has('email')) ? $data->email:''
		]);

		$departement = Auth::user()->departement;

		$departement->update([
			'import' => $settings->all()
		]);
	}
}

?>