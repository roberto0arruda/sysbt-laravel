<?php

use App\Models\Admin\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    public function run()
    {
        factory(Plan::class, 20)->create();
    }
}
