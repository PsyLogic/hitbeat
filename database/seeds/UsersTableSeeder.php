<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
                'name' => 'Othmane Nemli',
                'username' => 'nemli',
                'email' => 'nemli.othmane@gmail.com',
                'email_verified_at' => now(),
                'password' => 'secret',
            ]
        );
    }
}
