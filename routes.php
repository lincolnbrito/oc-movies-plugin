<?php
use LincolnBrito\Movies\Models\Actor;
Route::prefix('api/movies')->group(function(){
    Route::get('seed-actors', function() {
        
        $faker = Faker\Factory::create();

        for ($i=0; $i<100; $i++) {
            Actor::create([
                'name' => $faker->firstName,
                'lastname' => $faker->lastName
            ]);
        }

        return 'Actors created';
    });
});
