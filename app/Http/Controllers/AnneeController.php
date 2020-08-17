<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Annee};
use App\Http\Requests\AnneeCreateRequest;
use App\Gestion\GestionAnnee;

class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.index', [
            'form' => 'backend.forms.annee.create',
            'annees' => Annee::paginate(10),
            'paginates' => Annee::paginate(10)
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
    public function store(AnneeCreateRequest $request, GestionAnnee $gestion)
    {
        return back()->with('msg', $gestion->store($request));
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
    public function update(AnneeCreateRequest $request, GestionAnnee $gestion, $id)
    {
        return redirect()->action(
            'AnneeController@edit', [$gestion->update($request, $id)->slug]
        )->with('msg', trans('Annee modifier avec succes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GestionAnnee $gestion, $id)
    {
        return $gestion->delete($id);
    }
}
