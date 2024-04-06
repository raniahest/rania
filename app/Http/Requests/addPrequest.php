<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addPrequest extends FormRequest
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
            'idMateriel'=>'required|integer',
            'nom'=>'required',
            'numSalle'=>'required|integer',
            'numInv'=>'required|integer',
            'statut'=>'required',
            'direction'=>'required',
        ];
    }
}
