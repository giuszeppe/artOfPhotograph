<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Raccolta;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

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
            }
        );




        Event::listen('Alexusmai\LaravelFileManager\Events\DirectoryCreated', function ($event) {
            Log::info($event->path() . ' ' . $event->name());
            if ($event->path() == '') {
                Category::create(['name' => $event->name()]);
                Log::info('prova');
            } else {
                $cat = Category::where('name', $event->path())->first();
                $raccolta = new Raccolta();
                $raccolta->titolo = $event->name();
                $raccolta->category_id = $cat->id;
                $raccolta->save();
            }
        });
        Event::listen(
            'Alexusmai\LaravelFileManager\Events\FileCreating',
            function ($event) {
                Log::info('FileCreating:', [
                    $event->disk(),
                    $event->path(),
                    $event->name(), storage_path() . $event->path() . $event->name()
                ]);

                if ($event->path() == '') {
                    $cat = Category::where('name', 'homepage')->first();
                    $img = new Image();
                    $img->image_path =  $event->path() . '/' . $event->name();
                    $img->imageable_id =  $cat->id;
                    $img->imageable_type = Category::class;
                    $img->save();
                } else if (count(explode('/', $event->path())) == 1) {
                    abort(401, 'Non puoi creare file dentro alle category, solo aggiungere raccolte.');
                } else if (count(explode('/', $event->path())) > 2) {
                    abort(401, 'Azione non permessa.');
                } else {
                    $racc = Raccolta::where('titolo', explode('/', $event->path())[1])->first();
                    $img = new Image();
                    $img->image_path =  $event->path() . '/' . $event->name();
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

                foreach ($event->files() as $file) {

                    if ($event->path() == 'homepage') {
                        $cat = Category::where('name', 'homepage')->first();
                        $img = new Image();
                        $img->image_path =  $file['name'];
                        $img->imageable_id =  $cat->id;
                        $img->imageable_type = Category::class;
                        $img->save();
                    } else if (count(explode('/', $event->path())) == 1) {
                        abort(401, 'Non puoi creare file dentro alle category, solo aggiungere raccolte.');
                    } else if (count(explode('/', $event->path())) > 2) {
                        abort(401, 'Azione non permessa.');
                    } else {
                        $racc = Raccolta::where('titolo', explode('/', $event->path())[1])->first();
                        $img = new Image();
                        $img->image_path =  $file['name'];
                        $img->imageable_id =  $racc->id;
                        $img->imageable_type = Raccolta::class;
                        $img->save();
                    }
                }
            }
        );

        Event::listen(
            'Alexusmai\LaravelFileManager\Events\Deleting',
            function ($event) {
                $path = $event->items()[0]['path'];
                $pathExploded = explode('/', $path);
                Log::info('Deleting:', [
                    $event->disk(),
                    $event->items(),
                    $path,
                    $pathExploded
                ]);
                //categoria

                if ($event->items()[0]['type'] == 'dir') {
                    if ($pathExploded[0] == 'homepage' || $pathExploded[0] == 'about') {
                        abort(401, 'Azione non permessa');
                    } else if (count($pathExploded) == 1) {
                        Category::where('name', $path)->first()->delete();
                        //raccolta
                    } else {
                        Raccolta::where('titolo', end($pathExploded))->first()->delete();
                    }
                } else {
                    //immagine
                    $fileName = end($pathExploded);
                    Image::destroy(Image::where('image_path', $fileName)->first()->id);
                }
            }
        );
    }
}
