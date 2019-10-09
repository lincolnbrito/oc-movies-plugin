<?php namespace LincolnBrito\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLincolnbritoMoviesMoviesGenres extends Migration
{
    public function up()
    {
        Schema::create('lincolnbrito_movies_movies_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigInteger('movie_id');
            $table->bigInteger('genre_id');
            $table->primary(['movie_id','genre_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lincolnbrito_movies_movies_genres');
    }
}
