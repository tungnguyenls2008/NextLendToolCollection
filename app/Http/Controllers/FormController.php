<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class FormController extends Controller
{

    public function index()
    {
        $forms = Form::all()->toArray();
        return view('tools.form_builder.index', compact('forms'));
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
        $json_data = $request->json_data;
        $form = new Form();
        $form->form_title = $request->form_title;
        $form->json_data = $json_data;
        $form->creator = $request->user()->name;
        $form->version = 1;
        $form->save();
    }


    public function show($id)
    {
        $form = Form::find($id);
        return view('tools.form_builder.display', compact('form'));
    }


    public function edit($id)
    {
        $form = Form::find($id);
        return view('tools.form_builder.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }

    public function saveEditedJsonFromFormBuilder(Request $request)
    {
        $form_to_edit = Form::find($request->form_id);
        $version = $form_to_edit->version;
        $json_data = $request->json_data;
        $form = new Form();
        $form->form_title = $request->form_title;
        $form->json_data = $json_data;
        $form->creator = $request->user()->name;
        $form->version = $version + 1;
        $form->save();
    }
}
