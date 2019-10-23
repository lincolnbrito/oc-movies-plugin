<?php namespace LincolnBrito\Movies\Components;

use Cms\Classes\ComponentBase;
use Input;
use LincolnBrito\Movies\Models\Genre;
use LincolnBrito\Movies\Models\Movie;

class FilterMovies extends ComponentBase
{

    public $movies;
    public $genres;
    public $years;

    public function componentDetails()
    {
        return [
            'name' => 'Filter Movies',
            'description' => 'Enter actors'
        ];
    }
    
    public function onRun()
    {
        $this->movies = $this->filterMovies();
        $this->genres = Genre::all();
        $this->years = $this->filterYears();
        
    }

    public function filterYears() {
        $query = Movie::orderBy('year','desc')->distinct()->get(['year'])->pluck('year');
        
        return $query;
    }

    protected function filterMovies()
    {
        $year = Input::get('year');
        $genre = Input::get('genre');

        $query = Movie::all();

        if($year) {
            $query = Movie::where('year',$year)->get();
        }

        if($genre) {
            $query = Movie::whereHas('genres', function($filter) use($genre) {
                $filter->where('slug','=', $genre);
            })->get();
        }

        if($genre && $year) {
            $query = Movie::whereHas('genres', function($filter) use($genre) {
                $filter->where('slug','=', $genre);
            })->where('year',$year)->get();
        }

        return $query;
    }
    
}