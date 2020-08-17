<?php
namespace App\Gestion;
/**
 * Gestion categorie
 */

use App\Models\{Categorie, Produit, ImageProduit};
use Illuminate\Support\Str;


class GestionProduit
{
	
	public function store($data)
	{
		$produit = Produit::create([
			'id_categorie' => $data->categorie, 
			'nom' => $data->nom, 
			'slug' => Str::slug($data->nom), 
			'description' => $data->description, 
			'prix_achat' => $data->prix_achat, 
			'prix_vente' => $data->prix_vente, 
			'etat' => $data->etat, 
			'stock' => $data->stock
		]);

		$images = collect();

		if ($data->has('images')) {
			foreach ($data->images as $key => $image) {
				if ($image->isValid()) {
					$name = (string) Str::uuid();

					$extension = $image->extension();

					$path = $image->storeAs('public/produit', "$name.$extension", 'local');

					$images->push($path);
				}	
			}
		}

		$produit->update([
			'images' => $images->toJson()
		]);

		return trans('Produit creer avec success');
	}

	public function update($data, $key)
	{
		$produit = Produit::find($key);

		$produit->update([
			'id_categorie' => $data->categorie, 
			'nom' => $data->nom, 
			'slug' => Str::slug($data->nom), 
			'description' => $data->description, 
			'prix_achat' => $data->prix_achat, 
			'prix_vente' => $data->prix_vente, 
			'etat' => $data->etat, 
			'stock' => $data->stock
		]);

		$images = collect(json_decode($produit->images));

		if ($data->has('images')) {
			foreach ($data->images as $key => $image) {
				if ($image->isValid()) {
					$name = (string) Str::uuid();

					$extension = $image->extension();

					$path = $image->storeAs('public/produit', "$name.$extension", 'local');

					$images->push($path);
				}
					
			}
		}

		$produit->update([
			'images' => $images->toJson()
		]);

		return $produit;
	}

	public function delete($key)
	{
		# code...
	}
}

?>