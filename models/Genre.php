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
}
