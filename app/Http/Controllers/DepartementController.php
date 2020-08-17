<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Departement, Matiere, Utilisateur};
use App\Http\Requests\{DepartementCreateRequest, PersonnelCreateRequest};
use App\Gestion\{GestionDepartement, GestionPersonnel};

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.departement', [
            'form' => 'backend.forms.departement.create',
            'departements' => Departement::paginate(10),
            'matieres' => Matiere::get(),
            'utilisateurs' => Utilisateur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PersonnelCreateRequest $request, GestionPersonnel $gestion)
    {
        return back()->with('info', $gestion->store($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartementCreateRequest $request, GestionDepartement $gestion)
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
        return view('backend.personnel', [
            'form' => 'backend.forms.personnel.create',
            'departement' => Departement::whereSlug($id)->first(),
            'personnels' => Departement::whereSlug($id)
            ->first()
            ->utilisateurs()
            ->whereType(2)
            ->orWhere('type', 3)
            ->paginate(10)
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
        return view('backend.departement', [
            'form' => 'backend.forms.departement.edit',
            'departements' => Departement::paginate(10),
            'matieres' => Matiere::get(),
            'update' => Departement::whereSlug($id)->first(),
            'utilisateurs' => Utilisateur::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartementCreateRequest $request, GestionDepartement $gestion, $id)
    {
        return redirect()->action(
            'DepartementController@edit', [$gestion->update($request, $id)->slug]
        )->with('info', trans('Departement modifier avec succes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GestionDepartement $gestion, $id)
    {
        return $gestion->delete($id);
    }
}
