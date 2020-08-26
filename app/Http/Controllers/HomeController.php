<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Salle, Utilisateur, Annee, Inscrire, Matiere};

class HomeController extends Controller
{
    public function home()
    {
        $salles = Salle::get();
        $etudiant = Utilisateur::whereType(4)->count();
        $professeur = Utilisateur::whereType(3)->count();
        $matiere = Matiere::count();
        $derniere_annee = Annee::orderBy('id_annee', 'DESC')->first();

        switch (Auth::user()->type) {
            case 4:
                $inscription = Auth::user()->inscrires()->orderBy('id_annee', 'DESC')->first();
                return view('backend.forms.etudiant.emploi', [
                    'licence' => $inscription->licence,
                    'salles' => $salles,
                ]);
                break;
            case 2:
                $departement = Auth::user()->departement;

                $inscription = Inscrire::whereIn('id_licence', function ($query) use ($departement){
                    $query->from('licence')->where('id_departement', $departement->id_departement)->select('id_licence')->get();
                })->where('id_annee', $derniere_annee->id_annee)->count();

                $professeurs = $departement->utilisateurs()->whereType(3)->count();

                $matieres = $departement->matieres->count();

                return view('backend.home', [
                    'salles' => $salles,
                    'statistique' => [
                        'etudiant' => [
                            'total' => $inscription."/".$etudiant,
                            'taux' => ($etudiant > 0) ? ceil(($inscription*100)/$etudiant):0
                        ],
                        'matiere' => [
                            'total' => $matieres."/".$matiere,
                            'taux' => ($matiere > 0) ? ceil(($matieres*100)/$matiere):0
                        ],
                        'professeur' => [
                            'total' => $professeurs."/".$professeur,
                            'taux' => ($professeur > 0) ? ceil(($professeurs*100)/$professeur):0
                        ],
                    ]
                ]);
                break;
            default:
                return view('backend.home', [
                    'salles' => $salles,
                ]);
                break;
        }
    }
}
