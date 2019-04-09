<?php

use Illuminate\Database\Seeder;
use App\Artist;
use Faker\Generator as Faker;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            Artist::create([
                    'name' => $faker->name,
                ]
            );
        }
    }
}
