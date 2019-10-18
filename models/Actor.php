<?php namespace LincolnBrito\Movies\Models;

use Model;

/**
 * Model
 */
class Actor extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'lincolnbrito_movies_actors';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'movies' => [
            'LincolnBrito\Movies\Models\Movie',
            'table' => 'lincolnbrito_movies_actors_movies',
            'order' => 'name'
        ]
    ];

    public $attachOne = [
        'actorimage' => 'System\Models\File'
    ];

    public function getFullNameAttribute()
    {
        return $this->name . " " . $this->lastname;
    }
}
