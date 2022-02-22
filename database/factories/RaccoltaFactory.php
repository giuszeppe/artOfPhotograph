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

    public function definition()
    {
        $this->titolo = $this->faker->word();
        $cat = Category::orderByDesc('id')->first();
        Log::info($cat->id);
        Storage::makeDirectory('public/' . $cat->name . '/' . $this->titolo);

        return [
            'titolo' => $this->titolo,
            //
        ];
    }
    public function withDirectory()
    {
        return $this->state([]);
    }
}
