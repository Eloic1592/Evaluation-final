<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\html;
use App\Models\v_liste_evenement;
use App\Models\type_evenement;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function login(Request $request)
     {
        $admin = admin::where('email',$request->input('email'))->where('mdp',$request->input('mdp'))->first();
        if($admin){
            session()->put('admin', $admin);
            return redirect()->route('accueil-admin');
            }
        return redirect()->route('index')->with('failure', 'Email ou mot de passe incorrect!');

    }

    // Deconnexion
    public function deconnexion(){
        session()->forget('admin');
        return view('admin.index-admin');
    }

    public function accadmin()
    {
        $type_evenement=type_evenement::where('etat',0)->get();
        $modelTable = html::list(new v_liste_evenement(),['modifier','supprimer']);
            return view('admin.evenement',[
                'liste'=>$modelTable,
                'type_evenement'=>$type_evenement
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index-admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreadminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreadminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateadminRequest  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
