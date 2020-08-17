<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Matiere};
use App\Http\Requests\MatiereCreateRequest;
use App\Gestion\GestionMatiere;
use Illuminate\Support\Facades\Auth;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.matiere', [
            'form' => 'backend.forms.matiere.create',
            'matieres' => (Auth::user()->isAdmin()) ? Matiere::paginate(10):Auth::user()->departement->matieres()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatiereCreateRequest $request, GestionMatiere $gestion)
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.matiere', [
            'form' => 'backend.forms.matiere.edit',
            'matieres' => (Auth::user()->isAdmin()) ? Matiere::paginate(10):Auth::user()->departement->matieres()->paginate(10),
            'update' => Matiere::whereSlug($id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatiereCreateRequest $request, GestionMatiere $gestion, $id)
    {
        return redirect()->action(
            'MatiereController@edit', [$gestion->update($request, $id)->slug]
        )->with('info', trans('Matiere modifier avec succes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GestionMatiere $gestion, $id)
    {
        return $gestion->delete($id);
    }
}
