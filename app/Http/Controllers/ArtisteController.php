<?php

namespace App\Http\Controllers;

use App\Models\artiste;
use App\Models\devisartistes;
use App\Models\html;
use App\Http\Requests\StoreartisteRequest;
use App\Http\Requests\UpdateartisteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArtisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelTable = html::list(new artiste(),['modifier','supprimer']);
        return view('admin.artiste',['liste'=>$modelTable]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        artiste::create([
            'artiste'=>$request->input('artiste'),
            'tarif_heure'=>$request->input('tarif_heure'),
            'prixbase'=>$request->input('prixbase'),
            'photo'=>$request->input('visuel'),
        ]);

        return redirect()->back()->with('success', 'Information enregistree');
    }


    public function insertdevisartiste(Request $request)
    {
        devisartistes::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreartisteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreartisteRequest $request)
    {
        //
    }


    public function show($id)
    {
        $artiste=artiste::find($id);
        return view('edit.artiste',['artiste'=>$artiste]);
    }

    public function edit(Request $request)
    {
        artiste::where('id',$request->input('id'))->update([
            'artiste'=>$request->input('artiste'),
            'tarif_heure'=>$request->input('tarif_heure'),
            'prixbase'=>$request->input('prixbase'),
            'photo'=>$request->input('visuel')
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateartisteRequest  $request
     * @param  \App\Models\artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateartisteRequest $request, artiste $artiste)
    {
        //
    }
    public function destroy($id)
    {
        artiste::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    public function canceldestroy($id)
    {
        artiste::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
