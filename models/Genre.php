<?php namespace LincolnBrito\Movies\Models;

use Model;

/**
 * Model
 */
class Genre extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'lincolnbrito_movies_genres';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'movies' => [
            'LincolnBrito\Movies\Models\Movie',
            'table' => 'lincolnbrito_movies_movies_genres',
            'order' => 'name'
        ]
    ];
}
