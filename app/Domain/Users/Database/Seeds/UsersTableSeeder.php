<?php

namespace App\Domain\Users\Database\Seeds;

use App\Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Roberto Arruda',
            'email' => 'roberto0arruda@hotmail.com',
            'password' => '$2y$10$NLQe901.efYEZb8g2CxTvurH35rlrMYSUUQrGPk3hH.UjfaD1.aOm',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'role' => 1
        ]);
    }
}
