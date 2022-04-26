<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RaccoltaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    private $titolo;

    public function __constructor()
    {
        parent::__constructor();
        $this->titolo = $this->faker->word();
    }

    public static function createPaths($cat, $titolo)
    {
        $path = 'public/' . $cat->name . '/' . $titolo;
        $frontendPath = 'storage/' . $cat->name . '/' . $titolo;

        Storage::makeDirectory($path);


        return ['path' => 'storage/app/public/' . $cat->name . '/' . $titolo, 'frontendPath' => $frontendPath];
    }

    public function definition()
    {
        $this->titolo = $this->faker->word();
        $cat = Category::orderByDesc('id')->first();
        $path = 'public/' . $cat->name . '/' . $this->titolo;
        $frontendPath = 'storage/' . $cat->name . '/' . $this->titolo . '/';

        Storage::makeDirectory($path);


        $path = 'storage/app/public/' . $cat->name . '/' . $this->titolo;
        return [
            'titolo' => $this->titolo,
            'path' => $path,
            'frontendPath' => $frontendPath
            //
        ];
    }
    public function withDirectory()
    {
        return $this->state([]);
    }
}
