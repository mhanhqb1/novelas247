<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Movie;

class HomeController extends Controller
{
    /**
     * Homepage
     */
    public static function index()
    {
        $hotMovies = Movie::get_list([
            'is_hot' => 1,
            'limit' => 8,
            'is_random' => 1
        ]);
        return view('home.index', [
            'hot_movies' => $hotMovies
        ]);
    }
    
    /**
     * Get movie detail
     */
    public static function movieDetail($slug)
    {
        $limit = 8;
        $data = Movie::where('slug', $slug)->first();
        if (empty($data)) {
            die('Invalid movie');
        }
        $pageTitle = $data->name;
        $pageImage = $data->image;
        $related = Movie::inRandomOrder()->where('is_hot', 1)->where('slug', '!=', $slug)->limit($limit)->get();
        return view('home.video_detail', [
            'data' => $data, 
            'pageTitle' => $pageTitle,
            'pageImage' => $pageImage,
            'related' => $related
        ]);
    }
}