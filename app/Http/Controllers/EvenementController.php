<?php

namespace App\Http\Controllers;

use App\Models\evenement;
use App\Models\html;
use App\Models\type_evenement;
use App\Models\devis;
use App\Models\v_liste_evenement;
use App\Http\Requests\StoreevenementRequest;
use App\Http\Requests\UpdateevenementRequest;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $type_evenement=type_evenement::where('etat',0)->get();
        $modelTable = html::list(new v_liste_evenement(),['modifier','supprimer']);
            return view('admin.evenement',[
                'liste'=>$modelTable,
                'type_evenement'=>$type_evenement
        ]);
    }


    public function create(Request $request)
    {
        evenement::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }


    public function search(Request $request)
    {

        $query =v_liste_evenement::query();
        if ($request->has('nom')) {
            $query->where('nom', 'like', '%'.$request->input('nom').'%');
        }

        if ($request->has('description')) {
            $query->where('description', 'like', '%'.$request->input('description').'%');
        }

        if ($request->has('date_debut')) {
            $query->where('date_debut', '=',$request->input('date_debut'));
        }

        if ($request->has('idtype_evenement')) {
            $query->where('idtype_evenement', '=',$request->input('idtype_evenement'));
        }
        $data = $query->simplePaginate(10);
        dump($data);
        return redirect()->back()->with('recherche_evenement', $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreevenementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreevenementRequest $request)
    {
        //
    }

    public function show($id)
    {
        $evenement=evenement::find($id);
        $type_evenement=type_evenement::all();
        return view('edit.evenement',
        ['evenement'=>$evenement,
        'type_evenement'=>$type_evenement
            ]);
    }


    public function edit(Request $request)
    {
        evenement::where('id',$request->input('id'))->update([
            'idtype_evenement'=>$request->input('idtype_evenement'),
            'nom'=>$request->input('nom'),
            'description'=>$request->input('description'),
            'date_debut'=>$request->input('date_debut'),
            'date_fin'=>$request->input('date_fin'),
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateevenementRequest  $request
     * @param  \App\Models\evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateevenementRequest $request, evenement $evenement)
    {
        //
    }
    public function destroy($id)
    {
        evenement::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
    public function canceldestroy($id)
    {
        evenement::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
