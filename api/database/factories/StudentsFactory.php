<?php

namespace Database\Factories;
use App\Models\Students;
use Illuminate\Database\Eloquent\Factories\Factory;


class StudentsFactory extends Factory
{
    protected $model = Students::class;

    public function definition()
    {
        return [
            'cpf' => $this->faker->unique()->numberBetween($min = 10000000000, $max = 99999999999),
            'ra' => $this->faker->unique()->numberBetween($min = 1, $max = 99999999999),
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            
        ];
    }
}