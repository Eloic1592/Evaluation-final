<?php

namespace App\Http\Controllers;

use App\Models\devislieu;
use App\Http\Requests\StoredevislieuRequest;
use App\Http\Requests\UpdatedevislieuRequest;
use Illuminate\Http\Request;

class DevislieuController extends Controller
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
     * @param  \App\Http\Requests\StoredevislieuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredevislieuRequest $request)
    {
        //
    }

    public function show($id)
    {
        $devislieu=devislieu::find($id);
        return view('edit.devislieu',
        ['devislieu'=>$devislieu,
            ]);
    }

    public function edit(Request $request)
    {
        devislieu::where('id',$request->input('id'))->update([
            'prix'=>$request->input('prix'),
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedevislieuRequest  $request
     * @param  \App\Models\devislieu  $devislieu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedevislieuRequest $request, devislieu $devislieu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\devislieu  $devislieu
     * @return \Illuminate\Http\Response
     */
    public function destroy(devislieu $devislieu)
    {
        //
    }
}
