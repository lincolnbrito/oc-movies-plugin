<?php namespace LincolnBrito\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLincolnbritoMoviesGenres extends Migration
{
    public function up()
    {
        Schema::create('lincolnbrito_movies_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('genre_title');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lincolnbrito_movies_genres');
    }
}
