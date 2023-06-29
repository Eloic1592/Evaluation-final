<?php

namespace App\Http\Controllers;

use App\Models\autredepense;
use App\Models\html;
use App\Models\devisdepenses;
use App\Http\Requests\StoreautredepenseRequest;
use App\Http\Requests\UpdateautredepenseRequest;
use Illuminate\Http\Request;


class AutredepenseController extends Controller
{
    public function index()
    {

        $modelTable = html::list(new autredepense(),['modifier','supprimer']);
            return view('admin.autredepense',['liste'=>$modelTable,
        ]);
    }

    public function create(Request $request)
    {
        autredepense::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }

    public function insertdevisdepense(Request $request)
    {
        devisdepenses::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreautredepenseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreautredepenseRequest $request)
    {
        //
    }
    public function show($id)
    {
        $autredepense=autredepense::find($id);
        return view('edit.autredepense',['autredepense'=>$autredepense]);
    }

    public function edit(Request $request)
    {
        autredepense::where('id',$request->input('id'))->update([
            'nom'=>$request->input('nom'),
            'prixbase'=>$request->input('prixbase')
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateautredepenseRequest  $request
     * @param  \App\Models\autredepense  $autredepense
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateautredepenseRequest $request, autredepense $autredepense)
    {
        //
    }

    public function destroy($id)
    {
        autredepense::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    public function canceldestroy($id)
    {
        autredepense::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
