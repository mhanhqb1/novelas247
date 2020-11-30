<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Movie;
use App\Models\Video;

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
            return redirect()->route('home.index');
        }
        $pageTitle = $data->name;
        $pageImage = $data->image;
        $related = Movie::inRandomOrder()->where('is_hot', 1)->where('slug', '!=', $slug)->limit($limit)->get();
        return view('home.movie_detail', [
            'data' => $data, 
            'pageTitle' => $pageTitle,
            'pageImage' => $pageImage,
            'related' => $related
        ]);
    }
    
    /**
     * Get video detail
     */
    public static function videoDetail($movieSlug, $videoNumber)
    {
        $limit = 8;
        $data = Video::join('movies', 'movies.id', '=', 'videos.movie_id')
                ->where('videos.number', $videoNumber)
                ->where('movies.slug', $movieSlug)
                ->select(
                        'videos.*', 
                        'movies.name as movie_name', 
                        'movies.description', 
                        'movies.image',
                        'movies.rate',
                        'movies.country_id',
                        'movies.slug as movie_slug'
                )
                ->first();
        if (empty($data)) {
            die('Invalid movie');
        }
        $pageTitle = $data->movie_name . ' - ' . $data->number;
        $pageImage = $data->image;
        $listVideos = Video::where('movie_id', $data->movie_id)->orderBy('number', 'asc')->get();
        $related = Movie::inRandomOrder()->where('is_hot', 1)->where('id', '!=', $data->movie_id)->limit($limit)->get();
        return view('home.video_detail', [
            'data' => $data, 
            'pageTitle' => $pageTitle,
            'pageImage' => $pageImage,
            'related' => $related,
            'listVideos' => $listVideos,
            'videoNumber' => $videoNumber
        ]);
    }
}