<?php

namespace App\Http\Controllers;

use App\Models\type_lieu;
use App\Models\html;
use App\Http\Requests\Storetype_lieuRequest;
use App\Http\Requests\Updatetype_lieuRequest;
use Illuminate\Http\Request;


class TypeLieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelTable = html::list(new type_lieu(),['modifier','supprimer']);
            return view('admin.type_lieu',['liste'=>$modelTable,
        ]);
    }

    public function create(Request $request)
    {
        type_lieu::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storetype_lieuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storetype_lieuRequest $request)
    {
        //
    }

    public function show($id)
    {
        $type_lieu=type_lieu::find($id);
        return view('edit.type_lieu',['type_lieu'=>$type_lieu]);
    }

    public function edit(Request $request)
    {
        type_lieu::where('id',$request->input('id'))->update(['type_lieu'=>$request->input('type_lieu')]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetype_lieuRequest  $request
     * @param  \App\Models\type_lieu  $type_lieu
     * @return \Illuminate\Http\Response
     */
    public function update(Updatetype_lieuRequest $request, type_lieu $type_lieu)
    {
        //
    }

    public function destroy($id)
    {
        type_lieu::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    public function canceldestroy($id)
    {
        type_lieu::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
