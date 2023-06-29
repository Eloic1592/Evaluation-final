<?php

namespace App\Http\Controllers;

use App\Models\devisdepenses;
use App\Http\Requests\StoredevisdepensesRequest;
use App\Http\Requests\UpdatedevisdepensesRequest;
use Illuminate\Http\Request;


class DevisdepensesController extends Controller
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
     * @param  \App\Http\Requests\StoredevisdepensesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredevisdepensesRequest $request)
    {
        //
    }

    public function show($id)
    {
        $devisdepenses=devisdepenses::find($id);
        return view('edit.devisdepenses',
        ['devisdepenses'=>$devisdepenses,
            ]);
    }
    public function edit(Request $request)
    {
        devisdepenses::where('id',$request->input('id'))->update([
            'prix'=>$request->input('prix'),
        ]);
        return redirect()->back()->with('success', 'Information mise a jour');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedevisdepensesRequest  $request
     * @param  \App\Models\devisdepenses  $devisdepenses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedevisdepensesRequest $request, devisdepenses $devisdepenses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\devisdepenses  $devisdepenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(devisdepenses $devisdepenses)
    {
        //
    }
}
