<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Pressure implements Rule
{
    protected $diastolicPressure, $systolicPressure;

    public function __construct($systolicPressure, $diastolicPressure)
    {
        $this->systolicPressure = $systolicPressure;
        $this->diastolicPressure = $diastolicPressure;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->systolicPressure > $this->diastolicPressure;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A pressão sistólica não pode ser menor que a pressão diastólica';
    }
}
