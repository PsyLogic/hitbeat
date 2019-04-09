<?php

use Illuminate\Database\Seeder;
use App\Album;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $albums = [
            ['title' => 'Bacon and Eggs', 'artist_id' => 2, 'genre_id' => 4, 'cover' =>'clearday.jpg'],
            ['title' => 'Pizza head', 'artist_id' => 5, 'genre_id' => 10, 'cover' => 'energy.jpg'],
            ['title' => 'Summer Hits', 'artist_id' => 3, 'genre_id' => 1, 'cover' =>'goinghigher.jpg'],
            ['title' => 'The movie soundtrack', 'artist_id' => 2, 'genre_id' => 9, 'cover' =>'funkyelement.jpg'],
            ['title' => 'Best of the Worst', 'artist_id' => 1, 'genre_id' => 3, 'cover' =>'popdance.jpg'],
            ['title' => 'Hello World', 'artist_id' => 3, 'genre_id' => 6, 'cover' =>'ukulele.jpg'],
            ['title' => 'Best beats', 'artist_id' => 4, 'genre_id' => 7, 'cover' =>'sweet.jpg']
        ];

        foreach($albums as $album){
            Album::create($album);
        }
    }
}
