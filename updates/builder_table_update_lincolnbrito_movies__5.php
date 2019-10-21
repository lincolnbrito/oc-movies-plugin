<?php namespace LincolnBrito\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLincolnbritoMovies5 extends Migration
{
    public function up()
    {
        Schema::table('lincolnbrito_movies_', function($table)
        {
            $table->boolean('published')->nullable()->after('slug');
        });
    }
    
    public function down()
    {
        Schema::table('lincolnbrito_movies_', function($table)
        {
            $table->dropColumn('published');
        });
    }
}
