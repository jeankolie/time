<?php
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Models\{Media, Parametre};
use Illuminate\Support\Facades\Storage;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Writer\Csv;

function clear_image_directorie($classe, $path = 'public/media'){
	$deletes = collect();
    $files = collect(Storage::allFiles($path));

    foreach ($files as $key => $file) {
       	if (!$classe::whereImage($file)->exists() AND $file != $path.'/default.jpg') {
            $deletes->push($file);
       	}
    }

    Storage::delete($deletes->all());
}

function generate_code($n = 8) {  
    $generator = "1357902468";
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
    // Return result 
    return $result; 
}

function models(){
	return [
		//'utilisateur',
		//'annee',
		'departement',
		//'licence',
		//'semestre',
		//'matiere',
		//'enseigner',
		//'inscrire',
		//'salle',
		//'associer'
	];
}

function jours(){
	return [
		'Lundi',
		'Mardi',
		'Mercredi',
		'Jeudi',
		'Vendredi',
		'Samedi'
	];
}

function horaires(){
	return [
		'08H-11H',
		'11H-14H',
		'14H-17H',
		'17H-20H'
	];
}

function type_utilisateur(){
	return [
		1 => trans("Administrateur"),
		2 => trans("Personnel"),
		3 => trans("Professeur"),
		4 => trans("Etudiant"),
	];
}


function get_type_utilisateur($type){
	return type_utilisateur()[$type];
}


function dateFormat($date, $type = 'table'){
	if (empty($date)) {
		return "";
	}
 	switch ($type) {
 		case 'table':
 			return Carbon::parse($date)->locale('fr_FR')->isoFormat('LL');
 			break;
 		case 'mysql':
 			return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
 			break;
 		case 'form':
 			return Carbon::parse($date)->format('d/m/Y');
 			break;
 		case 'isoFormat':
 			if (empty($date)) {
 				return trans("Jamais");
 			}
 			return Carbon::parse($date)->locale('fr_FR')->isoFormat('LLLL');
 			break;
 		case 'human':
 			return Carbon::parse($date)->diffForHumans();
 			break;
 		default:
 			return "";
 			break;
 	}
}

function send_sms($message, $telephone)
{
	
}

function generate_otp($n = 6) {
    $generator = "1357902468ABCDEF";
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
    // Return result 
    return $result; 
}

function format_form_name($text){
	return preg_replace('#_#', ' ', $text);
}

function get_media($name){
	$media = Media::firstOrCreate(['nom' => $name]);

	if (!$media->titre) {
		$media->update([
			'titre' => strtoupper(format_form_name($name)),
			'texte' => strtoupper(format_form_name($name.'_texte')),
			'bouton' => 'Bouton action'
		]);
	}

	return $media;
}

function get_parametre($name){
	return Parametre::firstOrCreate([
		'nom' => $name
	])->valeur;
}

function local_money_format($montant, $symbole = ' GNF'){
    return number_format($montant, 0, ' ', ' ').$symbole;
}

function optimize_image($path, $size = false){
	$path = storage_path("app/$path");
    try {
        \Tinify\setKey("RMwUrt0pxypvC9IX6y4Mg8FFLTW6HPAw");
        $source = \Tinify\fromFile($path);

        if (!$size) {
            $source->toFile($path);
        }else {
            $resized = $source->resize(array(
                "method" => "cover",
                "width" => $size['width'],
                "height" => $size['height']
            ));

            $resized->toFile($path);
        }
    } catch (\Tinify\Exception $e) {
        // dd($e->getMessage());
    }
}

function excel_to_csv($file){
    $reader = new Xlsx();
    $spreadsheet = $reader->load($file);

    $loadedSheetNames = $spreadsheet->getSheetNames();

    $writer = new Csv($spreadsheet);

    foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
        $writer->setSheetIndex($sheetIndex);
        $writer->save(storage_path('app/certificat.csv'));
    }
}

function is_excel_file($file){
	if ($file->getMimetype()) {
		return preg_match('#application/vnd#', $file->getMimetype());
	}

	return false;
}

function is_csv_file($file){

	if ($file->getMimetype()) {
		return preg_match('#text/plain#', $file->getMimetype());
	}

	return false;
}

?>