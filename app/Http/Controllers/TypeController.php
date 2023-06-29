<?php

namespace App\Http\Controllers;

use App\Models\type;
use App\Models\html;
use App\Http\Requests\StoretypeRequest;
use App\Http\Requests\UpdatetypeRequest;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {

        $modelTable = html::list(new type(),['modifier','supprimer']);
            return view('admin.type',['liste'=>$modelTable,
        ]);
    }

    public function create(Request $request)
    {
        type::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretypeRequest $request)
    {
        //
    }

    public function show($id)
    {
        $type=type::find($id);
        return view('edit.type',['type'=>$type]);
    }

    public function edit(Request $request)
    {
        type::where('id',$request->input('id'))->update([
            'type'=>$request->input('type'),
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetypeRequest  $request
     * @param  \App\Models\type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetypeRequest $request, type $type)
    {
        //
    }

    public function destroy($id)
    {
        type::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    public function canceldestroy($id)
    {
        type::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
