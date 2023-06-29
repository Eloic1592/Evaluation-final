<?php

namespace App\Http\Controllers;

use App\Models\devislogistique;
use App\Http\Requests\StoredevislogistiqueRequest;
use App\Http\Requests\UpdatedevislogistiqueRequest;
use Illuminate\Http\Request;


class DevislogistiqueController extends Controller
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
     * @param  \App\Http\Requests\StoredevislogistiqueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredevislogistiqueRequest $request)
    {
        //
    }

    public function show($id)
    {
        $devislogistique=devislogistique::find($id);
        return view('edit.devislogistique',
        ['devislogistique'=>$devislogistique,
            ]);
    }

    public function edit(Request $request)
    {
        devislogistique::where('id',$request->input('id'))->update([
            'jour'=>$request->input('jour'),
            'quantite'=>$request->input('quantite'),
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedevislogistiqueRequest  $request
     * @param  \App\Models\devislogistique  $devislogistique
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedevislogistiqueRequest $request, devislogistique $devislogistique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\devislogistique  $devislogistique
     * @return \Illuminate\Http\Response
     */
    public function destroy(devislogistique $devislogistique)
    {
        //
    }
}
