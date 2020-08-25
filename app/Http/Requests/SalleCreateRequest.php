<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalleCreateRequest extends FormRequest
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
            'nom' => 'required|unique:salle',
            'capacite' => 'required'
        ];
    }

    public function updateStatement()
    {
        $id = $this->annee;
        return [
            'nom' => 'required',
            'capacite' => 'required'
        ];
    }
}
