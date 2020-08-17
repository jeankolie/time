<?php
namespace App\Gestion;

use App\Models\{Media};
use Illuminate\Support\Str;
/**
 * Gestion des labo
 */
class GestionMedia
{

	public function update($data, $id)
	{
		$media = Media::find($id);

		$media->update([
			'titre' => $data->titre,
			'texte' => $data->texte,
			'url' => $data->url,
			'bouton' => $data->bouton
		]);

		if ($data->has('image') AND $data->file('image')->isValid()) {

			$name = (string) Str::uuid();

			$extension = $data->image->extension();

			$path = $data->image->storeAs('public/media', "$name.$extension", 'local');

			$media->update([
				'image' => $path,
			]);

			//optimize_image($path);

			//clear_image_directorie(Media::class, 'public/media');
		}

		return trans("Media modifier avec succes");
	}
}
?>