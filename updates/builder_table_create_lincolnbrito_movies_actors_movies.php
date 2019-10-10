<?php namespace LincolnBrito\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLincolnbritoMoviesActorsMovies extends Migration
{
    public function up()
    {
        Schema::create('lincolnbrito_movies_actors_movies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigInteger('actor_id')->unsigned();
            $table->bigInteger('movie_id')->unsigned();
            $table->primary(['actor_id','movie_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lincolnbrito_movies_actors_movies');
    }
}
