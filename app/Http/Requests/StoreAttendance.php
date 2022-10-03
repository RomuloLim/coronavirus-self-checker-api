<?php

namespace App\Http\Requests;

use App\Rules\Pressure;
use Illuminate\Foundation\Http\FormRequest;

class StoreAttendance extends FormRequest
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
            'patient_id' => 'required|exists:patients,id',
            'temperature' => 'nullable|numeric',
            'systolic_pressure' => [
                'nullable',
                'numeric',
                new Pressure($this->systolic_pressure, $this->diastolic_pressure)
                ],
            'diastolic_pressure' => 'nullable|numeric',
            'respiratory_rate' => 'nullable|numeric',
            'pulse' => 'nullable|numeric',
            'symptoms' => 'required|array',
            'symptoms.*' => 'required|exists:symptoms,id',
        ];
    }

    public function messages()
    {
        return [
            'patient_id.required' => 'O campo paciente é obrigatório',
            'patient_id.exists' => 'O paciente informado não existe',
            'symptoms.required' => 'O campo sintomas é obrigatório',
            'symptoms.array' => 'Envie os sintomas corretamente',
            'symptoms.*.required' => 'O campo sintomas é obrigatório',
            'symptoms.*.exists' => 'O sintoma informado não existe',
        ];
    }
}
