<?php


namespace App\Domain\Products\Providers;

use App\Domain\Products\Database\Factories\ProductFactory;
use App\Domain\Products\Database\Migrations\CreateProductsTable;
use App\Domain\Products\Database\Seeds\ProductsTableSeeder;
use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as HasMigrations;

class DomainServiceProvider extends ServiceProvider
{
    use HasMigrations;

    public function register()
    {
        $this->registerMigrations();
        $this->registerModelFactories();
        $this->registerSeeders();
    }

    protected function registerMigrations()
    {
        $this->migrations([
            CreateProductsTable::class,
        ]);
    }

    protected function registerModelFactories()
    {
        (new ProductFactory())->define();
    }

    protected function registerSeeders()
    {
        $this->seeders([
            ProductsTableSeeder::class,
        ]);
    }
}
