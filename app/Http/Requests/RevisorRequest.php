<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RevisorRequest extends FormRequest
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
            'name' => 'required|string|',
            'surname' => 'required|string|',
            'email' => 'required|string|',
            'body' => 'required|string|max:600',
            'address' => 'required|string|',
            'date'=> 'required|date',
            'phone' => 'required|numeric',
        ];
    }


    public function messages(){
        return [
            'name.required' => 'Il campo è obbligatorio',
            'surname.required' => 'Il campo è obbligatorio',
            'email.required' => 'Il campo è obbligatorio',
            'body.required' => 'La descrizione è obbligatoria',
            'address.required' => 'Il campo è obbligatorio',
            'date.required' => 'Il campo è obbligatorio',
            'phone.required' => 'Il campo è obbligatorio',
        ];
    }
}
