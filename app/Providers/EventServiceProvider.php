<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Film;
use App\Models\Image;
use App\Models\Raccolta;
use Database\Factories\RaccoltaFactory;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
    
function isRootDir(string|null $path){
        return $path === null;
}
function isCategoryDir(string $path){
    return count(explode('/',$path)) == 1;
}
function isSpecialCategory(string $category){
    return in_array($category,config('path.specialCategory')); 
}
function isDirectoryTooNested(string $path){
    return count(explode('/',$path)) > 2;
}

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];





    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(
            'Alexusmai\LaravelFileManager\Events\DirectoryCreating',
            function ($event) {
                Log::info('DirectoryCreating:', [
                    $event->disk(),
                    $event->path(),
                    $event->name(),
                ]);
                if (count(explode('/', $event->path())) >= 2) {
                    abort(401, 'Azione non permessa');
                }
                $path = $event->path();
                Log::info($event->path());
                if (isRootDir($path)) {
                    Category::factory()->create(['name' => $event->name()]);
                } else {
                    $cat = Category::where('name', $path)->first();
                    $paths = RaccoltaFactory::createPaths($cat, $event->name());
                    Raccolta::create([
                        'titolo' => $event->name(),
                        'category_id' => $cat->id,
                        'path' => $paths['path'],
                        'frontendPath' => $paths['frontendPath']
                    ]);
                }
            }
        );




        Event::listen('Alexusmai\LaravelFileManager\Events\DirectoryCreated', function ($event) {
            /*$path = $event->path();
            Log::info($event->path());
            if (isRootDir($path)) {
                Category::factory()->create(['name' => $event->name()]);
            } else {
                $cat = Category::where('name', $path)->first();
                $paths = RaccoltaFactory::createPaths($cat, $event->name());
                Raccolta::create([
                    'titolo' => $event->name(),
                    'category_id' => $cat->id,
                    'path' => $paths['path'],
                    'frontendPath' => $paths['frontendPath']
                ]);
            }*/
        });
        Event::listen(
            'Alexusmai\LaravelFileManager\Events\FileCreating',
            function ($event) {

                $path = $event->path();


                Log::info('FileCreating:', [
                    $event->disk(),
                    $event->path(),
                    $event->name(), storage_path() . $event->path() . $event->name()
                ]);

                if (isRootDir($path)) {
                    $cat = Category::where('name', 'homepage')->first();
                    $cat->images()->create([
                        'image_path' => $path . '/' . $event->name(),
                    ]);
                

                } else if (isCategoryDir($path)) {
                    abort(401, 'Non puoi creare file dentro alle category, solo aggiungere raccolte.');
                } else if (isDirectoryTooNested($path)) {
                    abort(401, 'Azione non permessa.');
                } else {
                    $racc = Raccolta::where('titolo', explode('/', $path)[1])->first();
                    
                    $img = new Image();
                    $img->image_path =  $path . '/' . $event->name();
                    $img->imageable_id =  $racc->id;
                    $img->imageable_type = Raccolta::class;
                    $img->save();
                }
            }
        );
        Event::listen(
            'Alexusmai\LaravelFileManager\Events\FilesUploading',
            function ($event) {
                Log::info('FilesUploading:', [
                    $event->disk(),
                    $event->path(),
                    $event->files(),
                    $event->overwrite(),
                ]);
                $path = $event->path();

                foreach ($event->files() as $file) {
                    if($path == 'video'){
                            Film::create([
                                    'title' => $file['name'],
                                    'video_path' => 'video/' . $file['name']
                            ]); 
                    }else if ($path == 'homepage') {
                        $cat = Category::where('name', 'homepage')->first();
                        $cat->images()->create([
                            'frontendPath' => $cat->frontendPath . $file['name'],
                            'image_path' => $file['name']
                        ]);
                    } else if ($path == 'about') {
                        $cat = Category::where('name', 'about')->first();
                        $cat->images()->create([
                            'frontendPath' => $cat->frontendPath . $file['name'],
                            'image_path' => $file['name']
                        ]);
                    } else if (isCategoryDir($path)) {
                        abort(401, 'Non puoi creare file dentro alle category, solo aggiungere raccolte.');
                    } else if (isDirectoryTooNested($path)) {
                        abort(401, 'Azione non permessa.');
                    } else {
                        $racc = Raccolta::where('titolo', explode('/', $path)[1])->first();
                        $racc->images()->create([
                            'frontendPath' => $racc->frontendPath . $file['name'],
                            'image_path' => $file['name']
                        ]);
                    }
                }
            }
        );

        Event::listen(
            'Alexusmai\LaravelFileManager\Events\Deleting',
            function ($event) {
                Log::info('Deleting:', [
                    $event->disk(),
                    $event->items(),
                ]);
                //categoria
                foreach ($event->items() as $item) {
                    $path = $item['path'];
                    $pathExploded = explode('/', $path);

                    if ($item['type'] == 'dir') {
                        if (isSpecialCategory($pathExploded[0])) {
                            abort(401, 'Azione non permessa');
                        } else if (isCategoryDir($path)) {
                            Category::where('name', $path)->first()->delete();
                        } else {
                            //raccolta
                            Raccolta::where('titolo', end($pathExploded))->first()->delete();
                        }
                    } else {

                        //immagine
                        $fileName = end($pathExploded);
                        $fileDir =  $pathExploded[0];
                        //video
                        if($fileDir == 'video'){
                            $film = Film::where('title', $fileName)->first();
                            Film::destroy($film->id);
                        } else{
                            $image = Image::where('image_path', $fileName)->first();
                            Image::destroy($image->id);
                        }
                    }
                }
            }
        );
    }
}

