<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RaccoltaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titolo' => $this->faker->name()
            //
        ];
    }
}
