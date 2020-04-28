<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Project;
use App\Upload;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.home');
    }
    public function about()
    {
        return view('home.about');
    }
    public function gallery()
    {
        $images = Upload::where('type', 'gallery')->get();
        return view('home.gallery')->with('images', $images);
    }
    public function projects()
    {
        $projects = Project::all();
        return view('home.projects')->with('projects', $projects);
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function categories($slug)
    {
        $cat = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $cat->id)->get();
        return view('home.categories')
            ->with('products', $products);

    }
}
