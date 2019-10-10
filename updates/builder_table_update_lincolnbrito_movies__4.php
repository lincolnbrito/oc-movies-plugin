<?php namespace LincolnBrito\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLincolnbritoMovies4 extends Migration
{
    public function up()
    {
        Schema::table('lincolnbrito_movies_', function($table)
        {
            $table->dropColumn('actors');
        });
    }
    
    public function down()
    {
        Schema::table('lincolnbrito_movies_', function($table)
        {
            $table->text('actors')->nullable();
        });
    }
}
