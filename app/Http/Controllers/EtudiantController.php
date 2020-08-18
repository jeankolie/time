<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Annee, Departement, Inscrire, Licence, Utilisateur};
use App\Http\Requests\EtudiantCreateRequest;
use App\Gestion\GestionEtudiant;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($annee)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.forms.etudiant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtudiantCreateRequest $request, GestionEtudiant $gestion)
    {
        return back()->with('info', $gestion->store($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.etudiant', [
            'annee' => Annee::whereSlug($id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.forms.etudiant.edit', [
            'inscription' => Utilisateur::whereUuid($id)->first()->inscrires()->orderBy('id_annee', 'DESC')->first()
        ]);

        return view('backend.index', [
            'form' => 'backend.forms.annee.edit',
            'annees' => Annee::paginate(10),
            'update' => Annee::whereSlug($id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtudiantCreateRequest $request, GestionEtudiant $gestion, $id)
    {
        return back()->with('info', $gestion->update($request, $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GestionEtudiant $gestion, $id)
    {
        return $gestion->delete($id);
    }
}
