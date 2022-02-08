<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryName = config('database.categories');

        foreach ($categoryName as $name) {
            Category::create([
                'name' => $name,
            ]);
        }
    }
}
