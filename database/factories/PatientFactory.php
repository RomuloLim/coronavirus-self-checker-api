<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'identifier' => $this->faker->cpf(false),
            'birthdate' => $this->faker->date,
            'phone_number' => $this->faker->phoneNumber,
            'image' => $this->faker->imageUrl
        ];
    }
}
