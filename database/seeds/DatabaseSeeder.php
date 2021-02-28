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
      echo PHP_EOL , 'cleaning old data....';

        DB::table('users')->delete();

        echo PHP_EOL, 'seeding tables...';

        \App\User::create(
            [
            	'name' =>'rohit',
                'email' => 'rohit@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ]
        );
    }
}
