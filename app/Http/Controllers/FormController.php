<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class FormController extends Controller
{

    public function index()
    {
        $forms= Form::all()->toArray();
        return view('tools.form_builder.index',compact('forms'));
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
        $form=Form::find($id);
        return view('tools.form_builder.display',compact('form'));
    }


    public function edit($id)
    {
        $form=Form::find($id);
        return view('tools.form_builder.edit',compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
    public function saveJsonFromFormBuilder(Request $request){
        $json_data=$request->json_data;
        $formDataEdited=rtrim($json_data,']');
        $formDataEdited.=',{"type":"button","label":"Lưu hồ sơ","subtype":"button","className":"btn-primary btn","id":"submit","name":"submit","access":false,"style":"default"}]';
        $form=new Form();
        $form->form_name=$request->form_name;
        $form->json_data=$formDataEdited;
        $form->save();
    }
}
