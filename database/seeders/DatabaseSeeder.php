<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Film;
use App\Models\Raccolta;
use App\Models\User;
use Faker;
use Google\Service\YouTube;
use Google_Client;
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

     static public function fetchVideoFromYoutube(){
        Film::truncate();
        $DEVELOPER_KEY = 'AIzaSyCGILPCMutOGD0Gs5A5E2B1EHeqwC9hyx4';

        $client = new Google_Client();
        

        $client->setDeveloperKey($DEVELOPER_KEY);

        // Define an object that will be used to make all API requests.
        $youtube = new Youtube($client);


        // Call the search.list method to retrieve results matching the specified
        // query term.
        $searchResponse = $youtube->search->listSearch('id,snippet', ['channelId' => 'UCd7aULLkxl-y-K1RfyUmqQQ','maxResults' => 100]);

        $videos = '';
        $channels = '';
        $playlists = '';

        // Add each result to the appropriate list, and then display the lists of
        // matching videos, channels, and playlists.
        foreach ($searchResponse->getItems() as $searchResult) {
            switch ($searchResult['id']['kind']) {
                case 'youtube#video':
                  Log::info([$searchResult['snippet']['title'], $searchResult['id']['videoId']]);
                  Film::create([
                      'title' => html_entity_decode($searchResult['snippet']['title']),
                      'video_path' => $searchResult['id']['videoId']
                  ]);
                  break;
              }
            
        }
    }

    public function run()
    {

        $faker = Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));;

        
        
        $dirs = Storage::directories('public/');

        static::fetchVideoFromYoutube();
        

        foreach ($dirs as $dir) {
            if(str_contains($dir,'video')){
                continue;
            }
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
                Log::info($cat->path);
                $imageName = $faker->image('storage/app/public/homepage', 640, 425, false);
                $frontendPath = $cat->frontendPath . '/' . $imageName;
                return [
                    "image_path" => $imageName,
                    'frontendPath' => $frontendPath,
                ];
            })
            ->create(['name' => 'homepage']);
        Category::factory()
            ->hasImages(1, function ($attributes, Category $cat) use ($faker) {
                $imageName = $faker->image($cat->path, 640, 425, false);
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
                    ->hasImages(2, function ($attributes, Raccolta $racc) use ($faker) {
                        $imageName = $faker->image($racc->path, 640, 425, false);
                        $frontendPath = $racc->frontendPath . '/' . $imageName;

                        return [
                            "image_path" => $imageName,
                            'frontendPath' => $frontendPath,
                        ];
                    }),
                'raccolte'
            )->count(3)
            ->create();
            
    }
}
