<?php

namespace App\Http\Controllers;
use App\Models\type;
use App\Models\html;
use App\Models\sonorisation;
use App\Models\devissonorisation;
use App\Http\Requests\StoresonorisationRequest;
use App\Http\Requests\UpdatesonorisationRequest;
use Illuminate\Http\Request;
class SonorisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelTable = html::list(new sonorisation(),['modifier','supprimer']);
        return view('admin.sonorisation',['type'=>type::all(),
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
        sonorisation::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }

    public function insertdevissono(Request $request)
    {
        devissonorisation::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresonorisationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresonorisationRequest $request)
    {
        //
    }

    public function show($id)
    {
        $sonorisation=sonorisation::find($id);
        return view('edit.sonorisation',[
                'sonorisation'=>$sonorisation,
                'type'=>type::all()
            ]);
    }

    public function edit(Request $request)
    {
        sonorisation::where('id',$request->input('id'))->update([
            'sonorisation'=>$request->input('sonorisation'),
            'tarif_heure'=>$request->input('tarif_heure'),
            'idtype'=>$request->input('idtype'),
            'prixbase'=>$request->input('prixbase')
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesonorisationRequest  $request
     * @param  \App\Models\sonorisation  $sonorisation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesonorisationRequest $request, sonorisation $sonorisation)
    {
        //
    }

    public function destroy($id)
    {
        sonorisation::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    public function canceldestroy($id)
    {
        sonorisation::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
