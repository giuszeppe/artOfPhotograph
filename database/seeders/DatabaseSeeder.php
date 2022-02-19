<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Raccolta;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        File::cleanDirectory(public_path('images'));
        DB::table('users')->insert([
            'name' => 'Andrea Barcaccia',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        Category::factory()->hasImages(1)->create(['name' => 'homepage']);
        Category::factory()
            ->has(
                Raccolta::factory()->count(3)
                    ->hasImages(4),
                'raccolte'
            )->count(4)
            ->create();
    }
}
