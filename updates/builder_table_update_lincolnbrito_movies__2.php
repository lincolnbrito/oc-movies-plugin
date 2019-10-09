<?php namespace LincolnBrito\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLincolnbritoMovies2 extends Migration
{
    public function up()
    {
        Schema::table('lincolnbrito_movies_', function($table)
        {
            $table->string('slug')->nullable()->after('year');
        });
    }
    
    public function down()
    {
        Schema::table('lincolnbrito_movies_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
