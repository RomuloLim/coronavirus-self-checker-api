<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelLegends\PtBrValidator\Rules\Cpf;
use LaravelLegends\PtBrValidator\Rules\Telefone;
use LaravelLegends\PtBrValidator\Rules\TelefoneComDdd;

class CreateUpdateUser extends FormRequest
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
            'name' => 'required|string',
            'identifier' => [
                'required',
                'unique:patients,identifier',
                'string',
                new Cpf(),
            ],
            'phone_number' => [
                'required',
                'string',
            ],
            'birthdate' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}
