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
}
