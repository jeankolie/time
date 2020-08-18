<?php
namespace App\Gestion;

use Illuminate\Support\Facades\Auth;
use App\Models\{Annee, Utilisateur, Inscrire};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
/**
 * 
 */
class GestionImport
{
	
	public function fileToArray($filename = '', $delimiter = ';')
	{
	    if (!file_exists($filename) || !is_readable($filename))
	        return false;

	    $header = null;
	    $data = array();
	    if (($handle = fopen($filename, 'r')) !== false)
	    {
	        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
	        {
	            if (!$header)
	                $header = $row;
	            else
	                $data[] = array_combine($header, $row);
	        }
	        fclose($handle);
	    }

	    return $data;
	}

	public function import($request)
	{
		if ($request->has('csv') AND $request->file('csv')->isValid()) {

			if (is_excel_file($request->file('csv'))) {
				excel_to_csv($request->file('csv')->getRealPath());
				$file = storage_path('app/certificat.csv');
				$delimiter = ',';
			}else{
				$file = $request->file('csv')->getRealPath();
				$delimiter = $request->has('delimiter') ? $request->input('delimiter'):',';
			}

			$customerArr = $this->fileToArray($file, $delimiter);

			$setting = Auth::user()->departement->import;

			foreach ($customerArr as $key => $ligne) {

				$otp = '0000';//generate_code(5);

				$etudiant = Utilisateur::firstOrCreate([
					'matricule' => $ligne[$setting['matricule']]
				]);

				$etudiant->update([
					'uuid' => (string) Str::uuid(),
					'email' => $ligne[$setting['email']],
					'nom' => $ligne[$setting['nom']], 
					'prenom' => $ligne[$setting['prenom']], 
					'telephone' => $ligne[$setting['telephone']],
					'password' => Hash::make($otp), 
					'type' => 4
				]);

				Inscrire::firstOrCreate([
					'id_annee' => Annee::orderBy('id_annee', 'DESC')->first()->id_annee, 
					'id_utilisateur' => $etudiant->id_utilisateur
				])->update([
					'date_inscription' => date('Y-m-d'),
					'id_licence' => $request->licence
				]);
			}

			//dd($customerArr);
		}		
	}
}
?>