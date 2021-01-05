<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\DataPack;
use App\Models\Form;
use App\Models\Upload;
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


    public function store(Request $request)
    {
        $input_data = $_POST['user_data'];
        $dataObj = new Data();
        $dataObj->data = $input_data;
        $dataObj->form_id = $_POST['form_id'];
        $dataObj->data_pack = $_POST['data_pack'];
        $dataObj->creator = $request->user()->name;
        $dataObj->save();
        $dataPackObj = new DataPack();
        $dataPackObj->updateOrCreate(['data_pack' => $_POST['data_pack']],
            ['data_pack' => $_POST['data_pack'],
                'creator' => $request->user()->name,
                'form_id' => $_POST['form_id']]);
        //file upload
        $data = Form::find($_POST['form_id'])->toArray();
        $data_decode = json_decode($data['json_data']);

        foreach ($data_decode as $key => $item) {
            if (isset($item->name) && $request->hasFile($item->name)) {
                $file = $request->file($item->name);
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $upload = new Upload();
                $upload->filename = $name;
                $upload->extension = $file->extension();
                $upload->filepath = ('uploads/') . $name;
                $upload->form_id = $_POST['form_id'];
                $upload->html_element = $item->name;
                $upload->data_pack = $_POST['data_pack'];
                $upload->save();
                $file->move(public_path('uploads'), $name);


            }
        }
        return back()->with('success', 'Data Your files has been successfully added');
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
