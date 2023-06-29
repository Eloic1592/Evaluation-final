<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\point_de_vente;

class PDVController extends Controller
{


    public function ajoutpdv(Request $request){
        point_de_vente::create($request->all());
        return redirect()->back()->with('success', 'Point de vente enregistree !');

    }
    // Modifier
    public function modifier($id){

        $find=point_de_vente::find($id);
        return view('edit.editpdv',
        ['point_de_vente'=>$find,
        ]);
    }

    public function modifierpdv(Request $request){
        point_de_vente::where('id', $request->input('id'))->update([
        'nom' =>$request->input('nom'),
        'email' =>$request->input('email'),
        'mdp' =>$request->input('mdp')

    ]);
        return redirect()->back()->with('success', 'Modification enregistree !');

    }
}
