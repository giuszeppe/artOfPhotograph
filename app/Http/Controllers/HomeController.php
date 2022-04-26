<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Raccolta;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $about = Category::where('name', 'about')->first()->images;
        $cat = Category::where('name', 'homepage')->with('images')->first();
        return view('pages.home', ['images' => $cat->images, 'about' => $about]);
    }
    public function about()
    {
        $about = Category::where('name', 'about')->first()->images;
        return view('pages.about', compact('about'));
    }
    public function gallery()
    {
        $categories = Category::where('name', '<>', 'homepage')->where('name', '<>', 'about')->get();
        $raccolte = Raccolta::all();
        return view('pages.gallery', compact(['categories', 'raccolte']));
    }
    public function contact()
    { 
        return view('pages.contact');
    }
    public function services()
    {   
        return view('pages.services');    
    }
}
