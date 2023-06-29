<?php

namespace App\Http\Controllers;

use App\Models\ticketing;
use App\Models\html;
use App\Models\v_liste_ticketing;
use App\Models\evenement;
use App\Http\Requests\StoreticketingRequest;
use App\Http\Requests\UpdateticketingRequest;
use Illuminate\Http\Request;


class TicketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $evenement=evenement::where('etat',0)->get();
        $modelTable = html::list(new v_liste_ticketing(),['modifier','supprimer']);
            return view('admin.ticketing',['liste'=>$modelTable,
            'evenement'=>$evenement,
        ]);
    }


    public function create(Request $request)
    {
        ticketing::create($request->all());
        return redirect()->back()->with('success', 'Information enregistree');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreticketingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreticketingRequest $request)
    {
        //
    }

    public function show($id)
    {
        $ticketing=v_liste_ticketing::find($id);
        $evenement=evenement::all();
        return view('edit.ticketing',
        ['ticketing'=>$ticketing,
            'evenement'=>$evenement
        ]);
    }


    public function edit(Request $request)
    {
        ticketing::where('id',$request->input('id'))->update([
            'idevenement'=>$request->input('idevenement'),
            'date_debut'=>$request->input('date_debut'),
            'date_fin'=>$request->input('date_fin'),
            'prixunitaire'=>$request->input('prixunitaire'),
            'quantite'=>$request->input('quantite'),
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateticketingRequest  $request
     * @param  \App\Models\ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateticketingRequest $request, ticketing $ticketing)
    {
        //
    }

    public function destroy($id)
    {
        ticketing::where('id',$id)->update(['etat'=>1]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
    public function canceldestroy($id)
    {
        ticketing::where('id',$id)->update(['etat'=>0]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }
}
