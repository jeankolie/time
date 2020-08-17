<?php
namespace App\Gestion;

use App\Models\{Parametre};
use Illuminate\Support\Str;
/**
 * Gestion des labo
 */
class GestionParametre
{

	public function update($data, $id)
	{
		$media = Parametre::find($id);

		$media->update([
			'valeur' => $data->valeur,
		]);

		return trans("Parametre modifier avec succes");
	}
}
?>