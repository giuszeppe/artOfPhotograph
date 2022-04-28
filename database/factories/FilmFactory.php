<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'video_path' => 'video/VID_20220124_071125.mp4',
            'title' => $this->faker->title()
            //
        ];
    }
}
