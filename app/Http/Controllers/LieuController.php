<?php

namespace App\Http\Controllers;

use App\Models\lieu;
use App\Models\html;
use App\Models\type;
use App\Models\devislieu;
use App\Models\type_lieu;
use App\Models\categorie_place;
use App\Models\place_lieu;
use App\Models\v_liste_devisplace;
use App\Http\Requests\StorelieuRequest;
use App\Http\Requests\UpdatelieuRequest;
use Illuminate\Http\Request;
class LieuController extends Controller
{
    public function index()
    {
        $modelTable = html::list(new lieu(),['modifier','supprimer','ajoutplace']);
        return view('admin.lieu',['type'=>type::all(),
                                    'type_lieu'=>type_lieu::all(),
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
        lieu::create([
            'lieu'=>$request->input('lieu'),
            'capacite'=>$request->input('capacite'),
            'idtype_lieu'=>$request->input('idtype_lieu'),
            'prixbase'=>$request->input('prixbase'),
            'photo'=>$request->input('visuel'),
        ]);

        return redirect()->back()->with('success', 'Information enregistree');
    }

    public function insertdevislieu(Request $request)
    {
        devislieu::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelieuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelieuRequest $request)
    {
        //
    }

    public function show($id)
    {
        $lieu=lieu::find($id);
        return view('edit.lieu',['lieu'=>$lieu]);
    }

    public function edit(Request $request)
    {
        lieu::where('id',$request->input('id'))->update([
            'lieu'=>$request->input('lieu'),
            'capacite'=>$request->input('capacite'),
            'prixbase'=>$request->input('prixbase'),
            'photo'=>$request->input('visuel')
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    public function versajoutplace($id)
    {
        $conditions=[
            'idlieu'=>$id,
        ];

        $lieu=lieu::find($id);
        $modelTable = html::findwhere(new v_liste_devisplace(),$conditions);
        return view('admin.ajoutplace',[
            'lieu'=>$lieu,
            'liste'=>$modelTable,
            'categorieplace'=>categorie_place::all(),
    ]);

    }
    public function ajoutplace(Request $request)
    {

        $place_lieu = [
            'idlieu'=>$request->input('idlieu'),
            'idcategorie_place'=>$request->input('idcategorie_place'),
            'nombreplace'=>$request->input('nombreplace'),
            'prixbase'=>$request->input('prixbase'),
        ];
        place_lieu::insert($place_lieu);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelieuRequest  $request
     * @param  \App\Models\lieu  $lieu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelieuRequest $request, lieu $lieu)
    {
        //
    }

    public function destroy($id)
    {
        lieu::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    public function canceldestroy($id)
    {
        lieu::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
