<?php

namespace App\Http\Controllers;

use App\Models\stat_spectacle;
use App\Models\html;
use App\Models\total_devis_log;
use App\Models\total_devis_lieu;
use App\Models\total_devis_sono;
use App\Models\total_devis_artiste;
use App\Models\total_devis_dep;
use App\Http\Requests\Storestat_spectacleRequest;
use App\Http\Requests\Updatestat_spectacleRequest;

class StatSpectacleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelTable = html::list(new stat_spectacle());
        $stat_spectacle = stat_spectacle::all();
        return view('employe.statistique',['liste'=>$modelTable,
                                            'stat_spectacle'=>stat_spectacle::all(),
        'stat_spectacle'=>$stat_spectacle,
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
     * @param  \App\Http\Requests\Storestat_spectacleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storestat_spectacleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stat_spectacle  $stat_spectacle
     * @return \Illuminate\Http\Response
     */
    public function show(stat_spectacle $stat_spectacle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stat_spectacle  $stat_spectacle
     * @return \Illuminate\Http\Response
     */
    public function edit(stat_spectacle $stat_spectacle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatestat_spectacleRequest  $request
     * @param  \App\Models\stat_spectacle  $stat_spectacle
     * @return \Illuminate\Http\Response
     */
    public function update(Updatestat_spectacleRequest $request, stat_spectacle $stat_spectacle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stat_spectacle  $stat_spectacle
     * @return \Illuminate\Http\Response
     */
    public function destroy(stat_spectacle $stat_spectacle)
    {
        //
    }
}
