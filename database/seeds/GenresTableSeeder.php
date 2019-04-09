<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [	'Afro', 'Avant-garde', 'Blues', 'Caribbean', 'Comedy', 'Country', 'Easy listening', 'Electronic', 'Folk', 'Hip hop',  'Jazz',
            'Latin', 'Pop', 'R&B and soul', 'Rock'];

        foreach($genres as $genre){
            Genre::create(['name' => $genre]);
        }
    }
}
