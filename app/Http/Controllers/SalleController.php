<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Annee, Salle};
use App\Http\Requests\SalleCreateRequest;
use App\Gestion\GestionSalle;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.salle', [
            'form' => 'backend.forms.salle.create',
            'salles' => Salle::paginate(10)
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
    public function store(SalleCreateRequest $request, GestionSalle $gestion)
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
        return view('backend.salle', [
            'form' => 'backend.forms.salle.edit',
            'salles' => Salle::paginate(10),
            'update' => Salle::whereSlug($id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalleCreateRequest $request, GestionSalle $gestion, $id)
    {
        return redirect()->action(
            'SalleController@edit', [$gestion->update($request, $id)->slug]
        )->with('info', trans('Salle modifier avec succes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GestionSalle $gestion, $id)
    {
        return $gestion->delete($id);
    }
}
