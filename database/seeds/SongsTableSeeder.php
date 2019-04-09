<?php

use Illuminate\Database\Seeder;
use App\Song;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = [
            ['title'=>'Acoustic Breeze', 'artist_id'=>1, 'album_id' => 5, 'genre_id' => 8, 'duration' => '2:37','path' => 'bensound-acousticbreeze.mp3', 'album_order' => 1,'plays'  => 0],
            ['title'=>'A new beginning', 'artist_id'=>1, 'album_id' => 5, 'genre_id' => 1, 'duration' => '2:35','path' => 'bensound-anewbeginning.mp3', 'album_order' => 2,'plays'  => 0],
            ['title'=>'Better Days', 'artist_id'=>1, 'album_id' => 5, 'genre_id' => 2, 'duration' => '2:33','path' => 'bensound-betterdays.mp3', 'album_order' => 3,'plays'  => 0],
            ['title'=>'Buddy', 'artist_id'=>1, 'album_id' => 5, 'genre_id' => 3, 'duration' => '2:02','path' => 'bensound-buddy.mp3', 'album_order' => 4,'plays'  => 0],
            ['title'=>'Clear Day', 'artist_id'=>1, 'album_id' => 5, 'genre_id' => 4, 'duration' => '1:29','path' => 'bensound-clearday.mp3', 'album_order' => 5,'plays'  => 0],
            ['title'=>'Going Higher', 'artist_id'=>2, 'album_id' => 1, 'genre_id' => 1, 'duration' => '4:04','path' => 'bensound-goinghigher.mp3', 'album_order' => 1,'plays'  => 0],
            ['title'=>'Funny Song', 'artist_id'=>2, 'album_id' => 4, 'genre_id' => 2, 'duration' => '3:07','path' => 'bensound-funnysong.mp3', 'album_order' => 2,'plays'  => 0],
            ['title'=>'Funky Element', 'artist_id'=>2, 'album_id' => 1, 'genre_id' => 3, 'duration' => '3:08','path' => 'bensound-funkyelement.mp3', 'album_order' => 2,'plays'  => 0],
            ['title'=>'Extreme Action', 'artist_id'=>2, 'album_id' => 1, 'genre_id' => 4, 'duration' => '8:03','path' => 'bensound-extremeaction.mp3', 'album_order' => 3,'plays'  => 0],
            ['title'=> 'Epic', 'artist_id'=>2, 'album_id' => 4, 'genre_id' => 5, 'duration' => '2:58','path' => 'bensound-epic.mp3', 'album_order' => 3,'plays'  => 0]
        ];

        foreach($songs as $song){
            Song::create($song);
        }
    }
}
