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
    public function definition(): array
    {
        return [
            'image_path' => 'default.png',
        ];
    }
}
