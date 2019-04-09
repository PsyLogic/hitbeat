<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(ArtistsTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(SongsTableSeeder::class);
    }
}
