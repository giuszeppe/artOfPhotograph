<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\ImageOptimizer\OptimizerChain;
use Symfony\Component\HttpFoundation\File\UploadedFile;




class OptimizeImagesCustom extends \Spatie\LaravelImageOptimizer\Middlewares\OptimizeImages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    /*public function handle($request, Closure $next)
    {
        $optimizerChain = app(OptimizerChain::class);

        Log::info('CIAOO');

        collect($request->allFiles())
            ->flatten()
            ->filter(function (UploadedFile $file) {
                if (app()->environment('testing')) {
                    return true;
                }

                return $file->isValid();
            })
            ->each(function (UploadedFile $file) use ($optimizerChain) {
                $explodedPath = explode('/', $file->getPathname());
                Log::info(explode('/', $file->getPathname()));

                $pos = array_search('storage', explode('/', $file->getPathname()));
                if ($pos === false) {
                    return false;
                }

                /*array_splice($explodedPath, $pos, 0, 'app');
                array_splice($explodedPath, $pos + 1, 0, 'public');

                $explodedPath = implode('/', $explodedPath);
                Log::info($explodedPath);
                


                $optimizerChain->optimize($explodedPath);
            }); 

        }
        return $next($request); */
}
