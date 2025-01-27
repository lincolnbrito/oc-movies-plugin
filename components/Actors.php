<?php namespace LincolnBrito\Movies\Components;

use Cms\Classes\ComponentBase;
use LincolnBrito\Movies\Models\Actor;

class Actors extends ComponentBase
{

    public $actors;

    public function componentDetails()
    {
        return [
            'name' => 'Actor list',
            'description' => 'List of actors'
        ];
    }

    public function defineProperties()
    {
        return [
            'results' => [
                'title' => 'Number of actors',
                'description' => 'How many actors do you want to display?',
                'default' => 0,
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Only numbers allowed.'
            ],
            'sortOrder' => [
                'title' => 'Sort actors',
                'description' => 'How to sort the actors list',
                'type' => 'dropdown',
                'default' => 'name asc',                
            ]
        ];
    }

    public function getSortOrderOptions()
    {
        return [
            'name asc' => 'Name (ascending)',
            'name desc' => 'Name (descending)'
        ]; 
    }

    public function onRun()
    {
        $this->actors = $this->loadActors();
    }

    protected function loadActors()
    {
        $query =  Actor::all();

        if( $this->property('sortOrder') == 'name asc') {
            $query = $query->sortBy('name');
        }

        if( $this->property('sortOrder') == 'name desc') {
            $query = $query->sortByDesc('name');
        }

        if( $this->property('results') > 0) {
            $query = $query->take($this->property('results'));
        }

        return $query;
    }
}