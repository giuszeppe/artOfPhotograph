<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    static int $num = -1;

    public function definition()
    {
        $path = 'Prova' . static::$num;
        static::$num++;
        return [
            'name' => $path
        ];
    }
    public function configure()
    {
        return $this->afterMaking(function (Category $cat) {
            $cat->path = config('path.pathPrefix') . $cat->name;
            $cat->frontendPath = config('path.frontendPrefix') . $cat->name;
            
            Storage::makeDirectory('public/' . $cat->name);
        });
    }
}
