<?php

use App\Models\Admin\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class, 20)->create();
    }
}
