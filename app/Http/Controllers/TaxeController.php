<?php

namespace App\Http\Controllers;

use App\Models\taxe;
use App\Models\html;
use App\Http\Requests\StoretaxeRequest;
use App\Http\Requests\UpdatetaxeRequest;
use Illuminate\Http\Request;

class TaxeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $modelTable = html::list(new taxe(),['modifier','supprimer']);
            return view('admin.taxe',['liste'=>$modelTable,
        ]);
    }
    public function create(Request $request)
    {
        taxe::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretaxeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretaxeRequest $request)
    {
        //
    }

    public function show($id)
    {
        $taxe=taxe::find($id);
        return view('edit.taxe',['taxe'=>$taxe]);
    }
    public function edit(Request $request)
    {
        taxe::where('id',$request->input('id'))->update([
            'pourcentage'=>$request->input('pourcentage'),
            'date_taxe'=>$request->input('date_taxe'),
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetaxeRequest  $request
     * @param  \App\Models\taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetaxeRequest $request, taxe $taxe)
    {
        //
    }

    public function destroy($id)
    {
        taxe::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    public function canceldestroy($id)
    {
        taxe::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
