<?php

namespace App\Http\Controllers;

use App\Models\recette;
use App\Models\v_liste_devislieu;

use App\Models\v_liste_devisplace;
use App\Http\Requests\StorerecetteRequest;
use App\Http\Requests\UpdaterecetteRequest;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $v_liste_devisplace=v_liste_devisplace::where('idcategorie_place',$request->input('idcategorie_place'))->first();
        // dump( $v_liste_devisplace->nombreplace);
        $nombrevendu=$request->input('nombrevendu');

        if($nombrevendu> $v_liste_devisplace->nombreplace){
        // recette::create($request->all());
        return redirect()->back()->with('failure', 'nombre de place insuffisant');
        }
        elseif($nombrevendu< $v_liste_devisplace->nombreplace){
            return redirect()->back()->with('success', 'enregistree');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorerecetteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerecetteRequest $request)
    {
        //
    }

    public function show($iddevis)
    {
        $v_liste_devislieu=v_liste_devislieu::where('iddevis',$iddevis)->first();
        $v_liste_devisplace=v_liste_devisplace::where('idlieu',$v_liste_devislieu->idlieu)->get();
        return view('employe.recette',['v_liste_devislieu'=>$v_liste_devislieu,
        'v_liste_devisplace'=>$v_liste_devisplace,
        'iddevis'=>$iddevis,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function edit(recette $recette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterecetteRequest  $request
     * @param  \App\Models\recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterecetteRequest $request, recette $recette)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function destroy(recette $recette)
    {
        //
    }
}
