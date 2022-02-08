<?php

namespace Database\Seeders;

use App\Models\Raccolta;
use Illuminate\Database\Seeder;

class RaccoltaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $raccolte = config('database.raccolte');

        foreach ($raccolte as $name) {
            Raccolta::create([
                'name' => $name,
                'cat_id' => 1
            ]);
        }
    }
}
