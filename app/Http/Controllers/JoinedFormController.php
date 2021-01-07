<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\JoinedForm;
use Illuminate\Http\Request;

class JoinedFormController extends Controller
{

    public function index()
    {
        $forms = JoinedForm::orderBy('created_at','desc')->paginate(10);
        return view('tools.form_builder.joined_forms_index', compact('forms'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $json_data = $request->json_data;
        $origin_data = $request->origin_data;
        $json_data = json_decode($json_data);
        foreach ($json_data as $data) {
            if (isset($data->values)) {
                $value_reformat = [];
                foreach ($data->values as $value) {
                    $edited_value = (get_object_vars($value));
                    $edited_value = $this->changeKey($edited_value, 'label', $edited_value['value']);
                    unset($edited_value['value']);
                    unset($edited_value['selected']);
                    array_push($value_reformat, $edited_value);
                }
                $data->values = $value_reformat;
            }
        }
        $array_form_info = ["title" => $request->form_title, "form" => $json_data];
        $json_form_info = json_encode($array_form_info, JSON_UNESCAPED_UNICODE);
        $form = new JoinedForm();
        $form->form_title = $request->form_title;
        $form->json_data = $origin_data;
        $form->json_form_info = $json_form_info;
        $form->creator = $request->user()->name;
        $form->version = 1;
        $form->save();
        //return (json_encode($last_product,JSON_UNESCAPED_UNICODE));
    }


    public function show($id)
    {
        $form = JoinedForm::find($id);

        return view('tools.form_builder.display', compact('form'));
    }


    public function edit($id)
    {
        $form = JoinedForm::find($id);
        return view('tools.form_builder.joined_forms_edit', compact('form'));
    }


    public function update(Request $request, JoinedForm $joinedForm)
    {
        //
    }


    public function destroy(JoinedForm $joinedForm)
    {
        //
    }
    protected function join_form(Request $request)
    {
        $form_id_array = $request->selected_form_id;
        $new_form_name = $request->new_form_name;

        $joined_form = [];
        $joined_json_data=[];
        foreach ($form_id_array as $form_id) {
            $form = Form::find($form_id);
            $form_data = json_decode($form->json_form_info);
            $json_data = json_decode($form->json_data);
            array_push($joined_json_data,$json_data);
            array_push($joined_form, ($form_data));
        }
        $form = new JoinedForm();
        $form->form_title = $new_form_name;
        $joined_json_data=json_encode($joined_json_data,JSON_UNESCAPED_UNICODE);
        $joined_json_data=str_replace('],[',',',$joined_json_data);
        $joined_json_data=str_replace('[[','[',$joined_json_data);
        $joined_json_data=str_replace(']]',']',$joined_json_data);
        $form->json_data = $joined_json_data;
        $form->json_form_info = json_encode($joined_form,JSON_UNESCAPED_UNICODE);
        $form->creator = $request->user()->name;
        $form->version = 1;
        $form->save();
    }
    public function saveEditedJsonFromFormBuilder(Request $request)
    {
        $query = JoinedForm::query();
        $latest_version = $query->where('form_title', $request->form_title)->max('version');
        $json_data = $request->json_data;
        $json_data = json_decode($json_data);
        foreach ($json_data as $data) {
            if (isset($data->values)) {
                $value_reformat = [];
                foreach ($data->values as $value) {
                    $edited_value = (get_object_vars($value));
                    $edited_value = $this->changeKey($edited_value, 'label', $edited_value['value']);
                    unset($edited_value['value']);
                    unset($edited_value['selected']);
                    array_push($value_reformat, $edited_value);
                }
                $data->values = $value_reformat;
            }
        }
        $array_form_info = ["title" => $request->form_title, "form" => $json_data];
        $json_form_info = json_encode($array_form_info, JSON_UNESCAPED_UNICODE);
        $form = new JoinedForm();
        $form->form_title = $request->form_title;
        $form->json_data = json_encode($json_data,JSON_UNESCAPED_UNICODE);
        $form->json_form_info = $json_form_info;
        $form->creator = $request->user()->name;
        $form->version = $latest_version + 1;
        $form->save();
    }
    private function changeKey($array, $old_key, $new_key)
    {

        if (!array_key_exists($old_key, $array))
            return $array;

        $keys = array_keys($array);
        $keys[array_search($old_key, $keys)] = $new_key;

        return array_combine($keys, $array);
    }

}
