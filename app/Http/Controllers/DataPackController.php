<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\DataPack;
use App\Models\Form;
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

    public function show($id)
    {
        $data_pack = DataPack::find($id)->data_pack;
        $data=Data::where('data_pack',$data_pack)->get()->toArray();
        $data_decode=json_decode($data[0]['data']);
        $total_point=0;
        $point=0;
        foreach ($data_decode as $item){
            if (isset($item->point)){
                $total_point+=($item->point);
            }
            if (isset($item->point) && (isset($item->userData) && $item->userData!=[null])){
                $point+=($item->point);
            }

        }
        return view('pages.form_data.display', compact('data','point','total_point'));
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
