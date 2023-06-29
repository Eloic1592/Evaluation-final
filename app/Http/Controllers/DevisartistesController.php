<?php

namespace App\Http\Controllers;

use App\Models\devisartistes;
use App\Http\Requests\StoredevisartistesRequest;
use App\Http\Requests\UpdatedevisartistesRequest;
use Illuminate\Http\Request;
class DevisartistesController extends Controller
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
     * @param  \App\Http\Requests\StoredevisartistesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredevisartistesRequest $request)
    {
        //
    }

    public function show($id)
    {
        $devisartiste=devisartistes::find($id);
        return view('edit.devisartiste',
        ['devisartiste'=>$devisartiste,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\devisartistes  $devisartistes
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        devisartistes::where('id',$request->input('id'))->update([
            'heureartiste'=>$request->input('heureartiste'),
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedevisartistesRequest  $request
     * @param  \App\Models\devisartistes  $devisartistes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedevisartistesRequest $request, devisartistes $devisartistes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\devisartistes  $devisartistes
     * @return \Illuminate\Http\Response
     */
    public function destroy(devisartistes $devisartistes)
    {
        //
    }
}
