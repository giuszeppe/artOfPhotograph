<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    static int $num = 0;

    public function definition()
    {
        $path = 'Prova' . static::$num;
        Storage::makeDirectory('public/' . $path);
        static::$num++;
        return [
            'name' => $path
        ];
    }
}
