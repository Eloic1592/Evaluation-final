<?php

namespace App\Http\Controllers;

use App\Models\categorie_place;
use App\Http\Requests\Storecategorie_placeRequest;
use App\Http\Requests\Updatecategorie_placeRequest;
use Illuminate\Http\Request;
use App\Models\html;

class CategoriePlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelTable = html::list(new categorie_place(),['modifier','supprimer']);
        return view('admin.place',['liste'=>$modelTable]);
    }


    public function create(Request $request)
    {
        categorie_place::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storecategorie_placeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecategorie_placeRequest $request)
    {
        //
    }

    public function show($id)
    {
        $categorie_place=categorie_place::find($id);
        return view('edit.place',['categorie_place'=>$categorie_place]);
    }

    public function edit(Request $request)
    {
        categorie_place::where('id',$request->input('id'))->update([
            'categorie_place'=>$request->input('categorie_place'),

        ]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecategorie_placeRequest  $request
     * @param  \App\Models\categorie_place  $categorie_place
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecategorie_placeRequest $request, categorie_place $categorie_place)
    {
        //
    }

    public function destroy($id)
    {
        categorie_place::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    public function canceldestroy($id)
    {
        categorie_place::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
