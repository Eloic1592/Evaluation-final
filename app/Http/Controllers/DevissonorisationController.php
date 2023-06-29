<?php

namespace App\Http\Controllers;

use App\Models\devissonorisation;
use App\Http\Requests\StoredevissonorisationRequest;
use App\Http\Requests\UpdatedevissonorisationRequest;
use Illuminate\Http\Request;


class DevissonorisationController extends Controller
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
     * @param  \App\Http\Requests\StoredevissonorisationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredevissonorisationRequest $request)
    {
        //
    }

    public function show($id)
    {
        $devissono=devissonorisation::find($id);
        return view('edit.devissono',
        ['devissono'=>$devissono,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\devissonorisation  $devissonorisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        devissonorisation::where('id',$request->input('id'))->update([
            'heuresonorisation'=>$request->input('heuresonorisation'),
            'quantite'=>$request->input('quantite'),
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedevissonorisationRequest  $request
     * @param  \App\Models\devissonorisation  $devissonorisation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedevissonorisationRequest $request, devissonorisation $devissonorisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\devissonorisation  $devissonorisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(devissonorisation $devissonorisation)
    {
        //
    }
}
