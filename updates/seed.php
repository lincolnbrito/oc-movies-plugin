<?php namespace LincolnBrito\Movies\Updates;

use LincolnBrito\Movies\Models\Movie;
use October\Rain\Database\Updates\Seeder;
use Faker\Factory;

class SeedAllTables extends Seeder
{

    public function run()    
    {
        $faker = Factory::create();
        for ($i=0; $i<100; $i++) {
            Movie::create([
                'name' => $faker->sentence($nbWords = 3, $variablesNbWords = true),
                'slug' => str_slug($faker->sentence($nbWords = 3, $variablesNbWords = true), '-'),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'year' => $faker->year($max= 'now')
            ]);
        }
        
    }
    
}


