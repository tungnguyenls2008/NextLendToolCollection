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

    public function store(Request $request)
    {
        $json_data = $request->json_data;
        $json_data=json_decode($json_data);
        foreach ($json_data as $data){
            if (isset($data->values)){
                $value_reformat=[];
                foreach ($data->values as $value){
                    $edited_value=(get_object_vars($value));
                    $edited_value=$this->changeKey($edited_value,'label',$edited_value['value']);
                    unset($edited_value['value']);
                    unset($edited_value['selected']);
                    array_push($value_reformat,$edited_value);
                }
                $data->values=$value_reformat;
            }
        }
        $array_form_info=["title"=>$request->form_title,"form"=>$json_data];
        $json_form_info=json_encode($array_form_info,JSON_UNESCAPED_UNICODE);
        $form = new Form();
        $form->form_title = $request->form_title;
        $form->json_form_info = $json_form_info;
        $form->creator = $request->user()->name;
        $form->version = 1;
        $form->save();
        //return (json_encode($last_product,JSON_UNESCAPED_UNICODE));
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
        $query=Form::query();
        $latest_version=$query->where('form_title',$request->form_title)->max('version');
        $json_data = $request->json_data;
        $form = new Form();
        $form->form_title = $request->form_title;
        $form->json_data = $json_data;
        $form->creator = $request->user()->name;
        $form->version = $latest_version + 1;
        $form->save();
    }
    public function duplicate($id){

    }
    private function changeKey( $array, $old_key, $new_key ) {

        if( ! array_key_exists( $old_key, $array ) )
            return $array;

        $keys = array_keys( $array );
        $keys[ array_search( $old_key, $keys ) ] = $new_key;

        return array_combine( $keys, $array );
    }
    private function key_implode(&$array, $glue) {
        $result = "";
        foreach ($array as $key => $value) {
            $result .= $key . ":" . $value . $glue;
        }
        return substr($result, (-1 * strlen($glue)));
    }
    protected function join_form(Request $request){
        $form_id_array=$request->selected_form_id;
        $joined_form=[];
        foreach ($form_id_array as $form_id){
            $form=Form::find($form_id);
            $form_data=json_decode($form->json_form_info);
            array_push($joined_form,$form_data);

        }
        dd(json_encode($joined_form,JSON_UNESCAPED_UNICODE));

    }
}
