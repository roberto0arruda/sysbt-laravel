<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'Roberto Arruda',
                'email' => 'roberto0arruda@hotmail.com',
                'password' => '$2y$10$NLQe901.efYEZb8g2CxTvurH35rlrMYSUUQrGPk3hH.UjfaD1.aOm',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'role' => 1,
                'remember_token' => '',
            ],
        ];

        foreach ($items as $item) {
            User::create($item);
        }
    }
}
