<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Raccolta;
use App\Models\User;
use Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    static function addToFile($file, $where, $data)
    {
        $imgName = explode('/', $data);
        $data = '
        <!--REMOVE ' . end($imgName) . '-->' . '
        <div class="item" style="width:auto; height:550px;">
                <figure class="frame">
                        <img src="' . $data . '" alt="" />
                </figure>
        </div>';
        $contents = file_get_contents($file);
        $pos = strpos($contents, '<!--APPEND HERE-->');
        $contents = substr_replace($contents, $data, $pos + strlen('<!--APPEND HERE--> '), 0);
        file_put_contents($file, $contents);

        return 0;
    }
    static function removeFromFile($file, $imageInstance)
    {
        $lines = file($file);
        $i = 0;
        $linePos = 0;
        if (!$lines) {
            abort(404, 'file not found');
        }
        for ($i = 0; $i < count($lines); $i++) {
            $pos = strpos($lines[$i], '<!--REMOVE ' . $imageInstance->image_path . '-->');
            if ($pos != false) {
                $linePos = $i;
                break;
            }
        }
        array_splice($lines, $linePos, 6);
        file_put_contents($file, $lines);
    }

    public function run()
    {
        $faker = Faker\Factory::create();

        $dirs = Storage::directories('public/');

        foreach ($dirs as $dir) {
            Storage::deleteDirectory($dir);
        }


        File::cleanDirectory(public_path('images'));
        DB::table('users')->insert([
            'name' => 'Andrea Barcaccia',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        Category::factory()
            ->hasImages(1, function ($attributes, Category $cat) use ($faker) {
                $imageName = $faker->image($cat->path, 640, 425, null, false);
                $frontendPath = $cat->frontendPath . '/' . $imageName;
                return [
                    "image_path" => $imageName,
                    'frontendPath' => $frontendPath,
                ];
            })
            ->create(['name' => 'homepage']);
        Category::factory()
            ->hasImages(1, function ($attributes, Category $cat) use ($faker) {
                $imageName = $faker->image($cat->path, 640, 425, null, false);
                $frontendPath = $cat->frontendPath . '/' . $imageName;
                return [
                    "image_path" => $imageName,
                    'frontendPath' => $frontendPath,
                ];
            })
            ->create(['name' => 'about']);

        Category::factory()
            ->has(
                Raccolta::factory()->count(3)
                    ->hasImages(4, function ($attributes, Raccolta $racc) use ($faker) {
                        $imageName = $faker->image($racc->path, 640, 425, null, false);
                        $frontendPath = $racc->frontendPath . '/' . $imageName;

                        return [
                            "image_path" => $imageName,
                            'frontendPath' => $frontendPath,
                        ];
                    }),
                'raccolte'
            )->count(4)
            ->create();
    }
}
