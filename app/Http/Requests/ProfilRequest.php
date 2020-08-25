<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfilRequest extends FormRequest
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
        $id = Auth::user()->id_utilisateur;
        return [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => ['required', 'email', Rule::unique('utilisateur')->ignore($id, 'id_utilisateur')],
            'telephone' => ['required', Rule::unique('utilisateur')->ignore($id, 'id_utilisateur')]
        ];
    }

    public function updateStatement()
    {
        $id = $this->annee;
        return [
            'ancien' => 'required|password:web',
            'password' => 'required|confirmed'
        ];
    }
}
