<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required|max:255',
            'surname'=> 'required|max:255',
            'email'   => 'required|max:255',
            'phone'   => 'required|max:255',
        ];
        
    }
    public function messages(){
        $messages = [
            'name.required' =>    'name_required',
            'name.max'      =>     'name_max',
            'surname.required' => 'sur_name_required',
            'surname.max'      => 'sur_name_max',
            'email.required'    => 'email_required',
            'email.max'         => 'email_max',
            'phone.required'    => 'phone_required',
            'phone.max'         => 'phone_max',
        ];

        return $messages;
    }
}

