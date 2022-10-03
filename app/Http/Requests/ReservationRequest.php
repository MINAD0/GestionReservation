<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'filier' => 'required|string',
            'groupe' => 'required|integer',
            'salle' => 'required|integer',
            'dateD' => 'required|date',
            'dateF' => 'required|date',
            'consultant' => 'required|string',
            'type' => 'required|string',
            'choix' => 'required|string',

        ];
    }

    public function messages()
    {
        return [
            'filier.required' => 'filier obligatoire',
            'filier.string' => 'S\'il Vous Plait entrie Un Choix',
            'groupe.required' => 'groupe obligatoire',
            'groupe.integer' => 'S\'il Vous Plait entrie le Groupe ',
            'salle.required' => 'salle obligatoire',
            'salle.integer' => 'S\'il Vous Plait entrie la Salle ',
            'dateD.required' => 'dateD obligatoire',
            'dateD.date' => 'S\'il Vous Plait entrie la date ',
            'dateF.required' => 'dateD obligatoire',
            'dateF.date' => 'S\'il Vous Plait entrie la date ',
            'consultant.required' => 'consultant obligatoire',
            'consultant.string' => 'S\'il Vous Plait entrie le consultant ',
            'type.required' => 'type obligatoire',
            'type.string' => 'S\'il Vous Plait entrie le type ',
            'choix.required' => 'choix obligatoire',
            'choix.string' => 'S\'il Vous Plait entrie le choix ',


        ];
    }
}
