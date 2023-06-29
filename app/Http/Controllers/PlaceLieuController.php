<?php

namespace App\Http\Controllers;

use App\Models\place_lieu;
use App\Models\devisplace;
use App\Http\Requests\Storeplace_lieuRequest;
use App\Http\Requests\Updateplace_lieuRequest;
use Illuminate\Http\Request;

class PlaceLieuController extends Controller
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

    public function insertdevisplace(Request $request)
    {
        devisplace::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeplace_lieuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeplace_lieuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\place_lieu  $place_lieu
     * @return \Illuminate\Http\Response
     */
    public function show(place_lieu $place_lieu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\place_lieu  $place_lieu
     * @return \Illuminate\Http\Response
     */
    public function edit(place_lieu $place_lieu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateplace_lieuRequest  $request
     * @param  \App\Models\place_lieu  $place_lieu
     * @return \Illuminate\Http\Response
     */
    public function update(Updateplace_lieuRequest $request, place_lieu $place_lieu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\place_lieu  $place_lieu
     * @return \Illuminate\Http\Response
     */
    public function destroy(place_lieu $place_lieu)
    {
        //
    }
}
