<?php namespace LincolnBrito\Movies\Models;

use Model;

/**
 * Model
 */
class Movie extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'lincolnbrito_movies_';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'description' => 'required',
        'year' => 'required'
    ];

    public $jsonable = ['actors'];

    /**
     * Relations
     */
    public $attachOne = [
        'poster' => 'System\Models\File'
    ];

    public $attachMany = [
        'movie_gallery' => 'System\Models\File'
    ];

    public $belongsToMany = [
        'genres' => [
            'LincolnBrito\Movies\Models\Genre',
            'table' => 'lincolnbrito_movies_movies_genres',
            'order' => 'genre_title'
        ],
        'actors' => [
            'LincolnBrito\Movies\Models\Actor',
            'table' => 'lincolnbrito_movies_actors_movies',
            'order' => 'name'
        ]
    ];

    public static $allowedSortingOptions = [
        'name desc' => 'name desc',
        'name asc' => 'name asc',
        'year desc' => 'year desc',
        'year asc' => 'year asc'
    ];

    public function scopeListFrontend($query, $options = [])
    {
        extract(array_merge([
            'page' => 1,
            'perPage' => 10,
            'sort' => 'created_at desc',
            'genres' => null,
            'year' => ''
        ], $options));

        if(!is_array($sort)) {
            $sort = [$sort];           
        }

        foreach ($sort as $_sort) {
            if(in_array($_sort, array_keys(self::$allowedSortingOptions))) {
                $parts = explode(' ', $_sort);

                if(count($parts) < 2) {
                    array_push($parts, 'desc');
                }

                list($sortField, $sortDirection) = $parts;

                $query = $query->orderBy($sortField, $sortDirection);
            }
        }

        if($genres!==null ) {
            if(!is_array($genres)) {
                $genres = [$genres];
            }

            $query = $query->whereHas('genres', function($q) use($genres) {
                $q->whereIn('id',$genres);
            })  ;          
        }

        if($year) {
            $query->where('year','=',$year);
        }

        return $query->paginate($perPage, $page);
    }
}
