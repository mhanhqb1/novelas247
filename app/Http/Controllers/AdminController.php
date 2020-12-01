<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Video;
use App\Models\Country;

use Illuminate\Http\Request;

class AdminController extends Controller
{   
    /**
     * Get list movies
     */
    public static function movies(Request $request)
    {
        $params = $request->all();
        $params['limit'] = 999;
        $data = Movie::get_list($params);
        return view('admin.movies', ['data' => $data, 'params' => $params]);
    }
    
    /**
     * Add movie
     */
    public static function movieAdd(Request $request)
    {
        $countries = Country::get_list([
            'limit' => 999
        ]);
        return view('admin.movie_add', [
            'countries' => $countries
        ]);
    }
    
    /**
     * Add detail
     */
    public static function movieDetail($movieId)
    {
        $data = Movie::find($movieId);
        $country = Country::find($data->country_id);
        $videos = Video::where('movie_id', $data->id)->get();
        return view('admin.movie_detail', [
            'data' => $data,
            'country' => $country,
            'videos' => $videos
        ]);
    }
    
    /**
     * Edit movie
     */
    public static function movieEdit($movieId)
    {
        $data = Movie::find($movieId);
        $countries = Country::get_list([
            'limit' => 999
        ]);
        return view('admin.movie_add', [
            'data' => $data,
            'countries' => $countries
        ]);
    }
    
    /**
     * Save movie
     */
    public static function movieSave(Request $request)
    {
        if (!empty($request->id)) {
            $movie = Movie::find($request->id);
        } else {
            $movie = new Movie();
        }
        $movie->name = $request->name;
        $movie->slug = self::createSlug($request->name);
        $movie->image = $request->image;
        $movie->country_id = $request->country_id;
        $movie->description = $request->description;
        $movie->is_hot = !empty($request->is_hot) ? 1 : 0;
        $movie->save();
        
        return redirect()->route('admin.movies');
    }
    
    /**
     * Add video
     */
    public static function videoAdd($movieId)
    {
        return view('admin.video_add', [
            'movieId' => $movieId
        ]);
    }
    /**
     * Edit video
     */
    public static function videoEdit($videoId)
    {
        $data = Video::find($videoId);
        return view('admin.video_add', [
            'data' => $data,
            'movieId' => $data->movie_id
        ]);
    }
    
    /**
     * Save video
     */
    public static function videoSave(Request $request)
    {
        if (!empty($request->id)) {
            $video = Video::find($request->id);
        } else {
            $video = new Video();
        }
        $name = 'Capitulo'.' '.$request->number;
        $video->name = $name;
        $video->slug = self::createSlug($name);
        $video->movie_id = $request->movie_id;
        $video->number = $request->number;
        $video->content = $request->content;
        $video->save();
        
        return redirect()->route('admin.movie_detail', ['movieId' => $video->movie_id]);
    }
    
    public static function createSlug($str, $delimiter = '-'){

        $unwanted_array = ['ś'=>'s', 'ą' => 'a', 'ć' => 'c', 'ç' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ź' => 'z', 'ż' => 'z',
            'Ś'=>'s', 'Ą' => 'a', 'Ć' => 'c', 'Ç' => 'c', 'Ę' => 'e', 'Ł' => 'l', 'Ń' => 'n', 'Ó' => 'o', 'Ź' => 'z', 'Ż' => 'z']; // Polish letters for example
        $str = strtr( $str, $unwanted_array );

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
    
    /**
     * Get list images
     */
    public static function checkVideos(Request $request)
    {
        $params = $request->all();
        $params['limit'] = 999;
        $videos = YoutubeChannelVideo::get_list($params);
        return view('admin.video', ['videos' => $videos, 'params' => $params]);
    }
    
    /**
     * Add source
     */
    public static function addSource()
    {
        $types = MasterSource::$type;
        $sourceTypes = MasterSource::$sourceType;
        return view('admin.add_source', ['types' => $types, 'sourceTypes' => $sourceTypes]);
    }
    
    /**
     * Update image
     */
    public static function saveSource(Request $request)
    {
        $params = $request->all();
        $type = !empty($params['type']) ? $params['type'] : '';
        $sourceType = !empty($params['source_type']) ? $params['source_type'] : '';
        $name = !empty($params['name']) ? $params['name'] : '';
        $sourceParams = !empty($params['source_params']) ? $params['source_params'] : '';
        
        $masterSource = new MasterSource();
        $masterSource->type = $type;
        $masterSource->source_type = $sourceType;
        $masterSource->source_params = $sourceParams;
        $masterSource->name = $name;
        $masterSource->save();
        
        $types = MasterSource::$type;
        $sourceTypes = MasterSource::$sourceType;
        return view('admin.add_source', ['types' => $types, 'sourceTypes' => $sourceTypes]);
    }
    
    /**
     * Update image
     */
    public static function ajaxUpdateImages(Request $request)
    {
        # Init
        $result = [
            'status' => 'OK',
            'message' => ''
        ];
        $params = $request->all();
        $ids = !empty($params['ids']) ? explode(',', $params['ids']) : [];
        $field = !empty($params['field']) ? $params['field'] : '';
        $val = !empty($params['val']) ? $params['val'] : '';
        
        if (!empty($ids) && !empty($field) && !empty($val)) {
            foreach ($ids as $id) {
                $image = Image::find($id);
                if (!empty($image)) {
                    $image->$field = $val;
                    if ($field != 'status' && $val == 1) {
                        $image->status = 1;
                    }
                    $image->save();
                }
            }
        }
        
        echo json_encode($result);
        die();
    }
    
    /**
     * Update image
     */
    public static function ajaxUpdateVideos(Request $request)
    {
        # Init
        $result = [
            'status' => 'OK',
            'message' => ''
        ];
        $params = $request->all();
        $ids = !empty($params['ids']) ? explode(',', $params['ids']) : [];
        $field = !empty($params['field']) ? $params['field'] : '';
        $val = !empty($params['val']) ? $params['val'] : '';
        
        if (!empty($ids) && !empty($field) && !empty($val)) {
            foreach ($ids as $id) {
                $image = YoutubeChannelVideo::find($id);
                if (!empty($image)) {
                    $image->$field = $val;
                    if ($field != 'status' && $val == 1) {
                        $image->status = 1;
                    }
                    $image->save();
                }
            }
        }
        
        echo json_encode($result);
        die();
    }
}