<?php

namespace App\Http\Controllers;

use App\Models\v_liste_evenement;
use App\Http\Requests\Storev_liste_evenementRequest;
use App\Http\Requests\Updatev_liste_evenementRequest;

class VListeEvenementController extends Controller
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
     * @param  \App\Http\Requests\Storev_liste_evenementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storev_liste_evenementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\v_liste_evenement  $v_liste_evenement
     * @return \Illuminate\Http\Response
     */
    public function show(v_liste_evenement $v_liste_evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\v_liste_evenement  $v_liste_evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(v_liste_evenement $v_liste_evenement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatev_liste_evenementRequest  $request
     * @param  \App\Models\v_liste_evenement  $v_liste_evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Updatev_liste_evenementRequest $request, v_liste_evenement $v_liste_evenement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\v_liste_evenement  $v_liste_evenement
     * @return \Illuminate\Http\Response
     */
    public function destroy(v_liste_evenement $v_liste_evenement)
    {
        //
    }
}
