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
            'name'      => 'Roberto Arruda',
            'email'     => 'roberto@bt.com',
            'password'  => bcrypt('123456'),
        ]);

        User::create([
            'name'      => 'Tatiane Santos',
            'email'     => 'tatiane@bt.com',
            'password'  => bcrypt('123456'),
        ]);
    }
}