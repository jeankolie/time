<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantCreateRequest extends FormRequest
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
            'licence' => 'required',
            'matricule' => 'required|unique:utilisateur',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:utilisateur',
            'telephone' => 'required|unique:utilisateur'
        ];
    }

    public function updateStatement()
    {
        $id = $this->etudiant;
        return [
            'nom' => 'required',
        ];
    }
}
