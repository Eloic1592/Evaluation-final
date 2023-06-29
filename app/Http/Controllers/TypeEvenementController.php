<?php

namespace App\Http\Controllers;

use App\Models\type_evenement;
use App\Models\html;
use App\Http\Requests\Storetype_evenementRequest;
use App\Http\Requests\Updatetype_evenementRequest;
use Illuminate\Http\Request;

class TypeEvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $modelTable = html::list(new type_evenement(),['modifier','supprimer']);
            return view('admin.type_evenement',['liste'=>$modelTable,
        ]);
    }

    public function create(Request $request)
    {
        type_evenement::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storetype_evenementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storetype_evenementRequest $request)
    {
        //
    }

    public function show($id)
    {
        $type_evenement=type_evenement::find($id);
        return view('edit.type_evenement',['type_evenement'=>$type_evenement]);
    }

    public function edit(Request $request)
    {
        type_evenement::where('id',$request->input('id'))->update(['type_evenement'=>$request->input('type_evenement')]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetype_evenementRequest  $request
     * @param  \App\Models\type_evenement  $type_evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Updatetype_evenementRequest $request, type_evenement $type_evenement)
    {
        //
    }

    public function destroy($id)
    {
        type_evenement::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    public function canceldestroy($id)
    {
        type_evenement::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
