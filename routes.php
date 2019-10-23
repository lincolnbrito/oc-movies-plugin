<?php
use LincolnBrito\Movies\Models\Actor;
use LincolnBrito\Movies\Models\Genre;
use LincolnBrito\Movies\Models\Movie;

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


Route::get('sitemap.xml', function(){
    $movies = Movie::all();
    $genres = Genre::all();

    return Response::view('lincolnbrito.movies::sitemap', [
        'movies' => $movies,
        'genres' => $genres
    ])->header('Content-Type','text/xml');
});