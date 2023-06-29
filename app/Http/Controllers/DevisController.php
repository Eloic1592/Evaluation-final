<?php

namespace App\Http\Controllers;

use App\Models\devis;
use App\Models\v_liste_devis;
use App\Models\html;
use App\Http\Requests\StoredevisRequest;
use App\Http\Requests\UpdatedevisRequest;
use Illuminate\Http\Request;

class DevisController extends Controller
{

    public function details($idevenement)
    {
        $conditions=[
            'idevenement' => $idevenement,
        ];
        $v_liste_devis=html::findwhere(new v_liste_devis,$conditions,['details','genererpdf','dupliquer']);
        return view('employe.devis',['liste'=>$v_liste_devis]);

    }
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
    public function create(Request $request)
    {
        devis::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredevisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredevisRequest $request)
    {
        //
    }

    public function show($id)
    {
        return view('employe.newdevis',['evenement' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function edit(devis $devis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedevisRequest  $request
     * @param  \App\Models\devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedevisRequest $request, devis $devis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function destroy(devis $devis)
    {
        //
    }
}
