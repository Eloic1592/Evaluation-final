<?php

namespace App\Http\Controllers;

use App\Models\devisplace;
use App\Http\Requests\StoredevisplaceRequest;
use App\Http\Requests\UpdatedevisplaceRequest;
use Illuminate\Http\Request;

class DevisplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoredevisplaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredevisplaceRequest $request)
    {
        //
    }

    public function show($id)
    {
        $devisplace=devisplace::find($id);
        return view('edit.devisplace',
        ['devisplace'=>$devisplace,
            ]);
    }
    public function edit(Request $request)
    {
        devisplace::where('id',$request->input('id'))->update([
            'prix'=>$request->input('prix'),
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedevisplaceRequest  $request
     * @param  \App\Models\devisplace  $devisplace
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedevisplaceRequest $request, devisplace $devisplace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\devisplace  $devisplace
     * @return \Illuminate\Http\Response
     */
    public function destroy(devisplace $devisplace)
    {
        //
    }
}
