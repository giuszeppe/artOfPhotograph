<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Raccolta;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = new Faker();

        return [
            'image_path' => $this->faker->image(public_path('images'), 640, 480, null, false),
        ];
    }
}
