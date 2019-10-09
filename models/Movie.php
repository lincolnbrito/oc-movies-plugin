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

    /**
     * Relations
     */
    public $attachOne = [
        'poster' => 'System\Models\File'
    ];

    public $attachMany = [
        'movie_gallery' => 'System\Models\File'
    ];
}
