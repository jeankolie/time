<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelCreateRequest extends FormRequest
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

    public function rules()
    {
        return ($this->operation) ? $this->createStatement() : $this->updateStatement();
    }

    public function createStatement()
    {
        return [
            'nom' => 'required',
            'telephone' => 'required|unique:utilisateur',
            'email' => 'required|unique:utilisateur'
        ];
    }

    public function updateStatement()
    {
        $id = $this->annee;
        return [
            'nom' => 'required',
        ];
    }
}
