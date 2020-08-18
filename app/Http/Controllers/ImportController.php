<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Departement, Matiere, Utilisateur};
use App\Http\Requests\{DepartementCreateRequest, PersonnelCreateRequest};
use App\Gestion\{GestionDepartement, GestionPersonnel, GestionImport};

class ImportController extends Controller
{
    public function eleve(Request $request, GestionDepartement $gestion, GestionImport $import)
    {
    	$gestion->setImportSettings($request);
    	$import->import($request);
    	return back();
    	
    	//dd($request->all());
    }
}
