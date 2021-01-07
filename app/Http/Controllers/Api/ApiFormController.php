<?php



namespace App\Http\Controllers\Api;



use Illuminate\Http\Request;

use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\Form;

use Validator;
use App\Http\Resources\Form as FormResource;



class ApiFormController extends BaseController

{


    public function index()

    {

        $forms = Form::all();
        return $this->sendResponse($forms, 'All forms retrieved successfully.');
    }


    public function store(Request $request)

    {

    }



    public function show($id)

    {
        $form = Form::find($id);
        if (is_null($form)) {
            return $this->sendError('Form not found.');
        }
        else{
            $json_form_info=(json_decode($form->json_form_info));
            return $this->sendResponse($json_form_info, 'Form retrieved successfully.');
        }

    }





    public function update(Request $request, Form $form)

    {


    }




    public function destroy(Form $form)

    {

    }

}
