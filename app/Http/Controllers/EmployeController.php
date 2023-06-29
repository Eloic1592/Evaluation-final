<?php

namespace App\Http\Controllers;

use App\Models\employe;
use App\Models\html;
use App\Models\v_liste_evenement;
use App\Models\type_evenement;
use App\Http\Requests\StoreemployeRequest;
use App\Http\Requests\UpdateemployeRequest;
use Illuminate\Http\Request;

class EmployeController extends Controller
{

    public function login(Request $request)
    {
        $employe = employe::where('email',$request->input('email'))->where('mdp',$request->input('mdp'))->first();

        if($employe){
            session()->put('employe', $employe);
            return redirect()->route('accueil-employe');
            }
        return redirect()->back()->with('failure', 'Email ou mot de passe incorrect!');

    }

        // Deconnexion
        public function deconnexion(){
            session()->forget('employe');
            return view('employe.index-employe');
        }


    public function accemploye()
    {

        $modelTable = html::list(new v_liste_evenement(),['nouveaudevis','devis']);
            return view('employe.evenement',[
                'liste'=>$modelTable,
                'type_evenement'=>type_evenement::all(),

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employe.index-employe');
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
     * @param  \App\Http\Requests\StoreemployeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreemployeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(employe $employe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateemployeRequest  $request
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateemployeRequest $request, employe $employe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(employe $employe)
    {
        //
    }
}
