<?php

namespace App\Http\Controllers;

use App\Models\DataPack;
use Illuminate\Http\Request;

class DataPackController extends Controller
{

    public function index()
    {
        $data= DataPack::all()->toArray();
        return view('pages.form_data.index',compact('data'));
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
     * @param  \App\Models\DataPack  $dataPack
     * @return \Illuminate\Http\Response
     */
    public function show(DataPack $dataPack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPack  $dataPack
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPack $dataPack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPack  $dataPack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPack $dataPack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPack  $dataPack
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPack $dataPack)
    {
        //
    }
}
