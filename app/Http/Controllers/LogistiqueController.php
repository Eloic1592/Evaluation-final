<?php

namespace App\Http\Controllers;

use App\Models\logistique;
use App\Models\html;
use App\Models\type;
use App\Models\devislogistique;
use App\Http\Requests\StorelogistiqueRequest;
use App\Http\Requests\UpdatelogistiqueRequest;
use Illuminate\Http\Request;

class LogistiqueController extends Controller
{
    public function index()
    {
        $modelTable = html::list(new logistique(),['modifier','supprimer']);
        return view('admin.logistique',['type'=>type::all(),
                                            'liste'=>$modelTable
                                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        logistique::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }

    public function insertdevislogistique(Request $request)
    {
        devislogistique::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelogistiqueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelogistiqueRequest $request)
    {
        //
    }

    public function show($id)
    {
        $logistique=logistique::find($id);
        return view('edit.logistique',[
                'logistique'=>$logistique,
                'type'=>type::all()
            ]);
    }

    public function edit(Request $request)
    {
        logistique::where('id',$request->input('id'))->update([
            'logistique'=>$request->input('logistique'),
            'tarif_jour'=>$request->input('tarif_jour'),
            'idtype'=>$request->input('idtype'),
            'prixbase'=>$request->input('prixbase')
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelogistiqueRequest  $request
     * @param  \App\Models\logistique  $logistique
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelogistiqueRequest $request, logistique $logistique)
    {
        //
    }

    public function destroy($id)
    {
        logistique::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    public function canceldestroy($id)
    {
        logistique::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
