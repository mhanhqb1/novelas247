<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'content',
        'movie_id',
        'number',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    public $timestamps = true;
    
    public static $linkPrefix = '*_*';
    public static $sourceId = [
        'dailymotion' => 'dailymotion_id',
        'youtube' => 'youtube_id',
        'gg_driver' => 'gg_driver_id',
        'ok_ru' => 'ok_ru_id'
    ];

    public static function get_list($params) {
        # Init
        $limit = !empty($params['limit']) ? $params['limit'] : 16;
        $page = !empty($params['page']) ? $params['page'] : 1;
        $offset = ($page - 1)*$limit;

        # Get data
        if (!empty($params['is_random'])) {
            $data = self::inRandomOrder();
        } else {
            $data = self::orderBy('id', 'desc');
        }

        # Filter
        if (isset($params['status']) && $params['status'] != '') {
            $data = $data->where('status', $params['status']);
        }
        if (isset($params['is_hot']) && $params['is_hot'] != '') {
            $data = $data->where('is_hot', $params['is_hot']);
        }

        # Return data
        $data = $data->offset($offset)->limit($limit)->get();
        return $data;
    }

}
