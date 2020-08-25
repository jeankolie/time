<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Annee, Departement, Inscrire, Licence, Semestre, Salle, Utilisateur, Enseigner};
use App\Http\Requests\EmploiCreateRequest;
use App\Gestion\GestionEmploi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.emploi', [
            'licences' => Auth::user()->departement->licences,
            'salles' => Salle::get(),
            'professeurs' => Utilisateur::where('type', '<>', 1)->where('type', '<>', 4)->orderBy('nom')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $licence = Auth::user()->departement->licences()->whereIn('id_licence', function ($query) use ($request){
            $query->from('licence')->whereSlug($request->licence)->select('id_licence')->get();
        })->first();

        return view('backend.forms.emploi.create', [
            'licence' => $licence,
            'salles' => Salle::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmploiCreateRequest $request, GestionEmploi $gestion)
    {
        $annee = Annee::orderBy('id_annee', 'DESC')->first();

        $salle = Enseigner::where('id_salle', $request->salle)
            ->where('id_annee', $annee->id_annee)
            ->where('jour', $request->jour)
            ->where('interval', $request->horaire);

        $professeur = Enseigner::where('id_utilisateur', $request->professeur)
            ->where('id_annee', $annee->id_annee)
            ->where('jour', $request->jour)
            ->where('interval', $request->horaire);

        if ($salle->count()) {
            $emp = $salle->first();
            $message = trans("Desoler cette salle est occuper le :jour de :heure par :prof", [
                'jour' => $emp->jour,
                'heure' => $emp->interval,
                'prof' => $emp->utilisateur->nomComplet()
            ]);

            return back()->with('msg', $message);

        }elseif ($professeur->count()) {
            $emp = $professeur->first();
            $message = trans("Desoler cet professeur est programmer le :jour de :heure dans la salle :salle", [
                'jour' => $emp->jour,
                'heure' => $emp->interval,
                'salle' => $emp->salle->nom
            ]);
            return back()->with('msg', $message);
        }


        return back()->with('info', $gestion->store($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        Validator::make($request->all(), [
            'niveau-message' => 'required',
            'message' => 'required',
        ])->validate();

        $niveau = Auth::user()->departement->licences()->where('id_licence', $request->input('niveau-message'))->first();
        foreach ($niveau->inscrires as $key => $inscrire) {
            send_sms(
                $request->message, 
                $inscrire->utilisateur->telephone
            );
        }

        return back()->with('info', "Message envoye avec succes");
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
    public function destroy(Request $request, GestionEmploi $gestion, $id)
    {
        return $gestion->delete($request);
    }
}
