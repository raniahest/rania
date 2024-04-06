<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addrequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=>'required|email',
            'idUser'=>'required',
            'password'=>'required',
            'name'=>'required',
            'username'=>'required',
            'role'=>'required',
            'matricule'=>'required|integer',
            'nom'=>'required'

        ];
    }
}
