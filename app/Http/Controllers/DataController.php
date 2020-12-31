<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\DataPack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{

    public function index()
    {

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_data = $request->input_data;
        foreach ($input_data as $data) {
            $dataObj = new Data();
            $dataObj->name = $data['name'];
            $dataObj->value = $data['value'];
            $dataObj->data_pack = $request->data_pack;
            $dataObj->creator = $request->user()->name;
            $dataObj->save();

            $dataPackObj = new DataPack();
            $dataPackObj->data_pack = $request->data_pack;
            $dataPackObj->creator = $request->user()->name;
            $dataPackObj->updateOrCreate(['data_pack' => $request->data_pack],
                ['data_pack' => $request->data_pack,
                    'creator' => $request->user()->name]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Data $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Data $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Data $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Data $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }

}
