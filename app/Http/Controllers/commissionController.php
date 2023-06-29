<?php

namespace App\Http\Controllers;

use App\Models\commission;
use App\Models\html;
use Illuminate\Http\Request;

class commissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commission=new commission();
        $modelTable = html::list($commission,['details','modifier','supprimer']);
            return view('listearticle',['liste'=>$modelTable,
        ]);
    }

    public function details($id)
    {
        $conditions = [
            'prixminimum' => [
                'operator' => '>=',
                'value' => 5000,
            ],
        ];

        $html = html::findwhere(new commission,$conditions,1);
        // dump($html);
        return view('detailscommission',['details'=>$html
    ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editform = html::generateModelEditForm(new commission,$id);
        return view('edit.editcommission',['editform'=>$editform]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(client $client)
    {
        //
    }
}
