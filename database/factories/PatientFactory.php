<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'date_of_birth' => $this->faker->date(),
            'phone' => $this->faker->optional()->phoneNumber(),
            'email' => $this->faker->optional()->unique(),
            'address' => $this->faker->optional()->address(),
        ];
    }
}
