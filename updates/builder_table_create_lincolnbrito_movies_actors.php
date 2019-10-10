<?php namespace LincolnBrito\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLincolnbritoMoviesActors extends Migration
{
    public function up()
    {
        Schema::create('lincolnbrito_movies_actors', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lincolnbrito_movies_actors');
    }
}
