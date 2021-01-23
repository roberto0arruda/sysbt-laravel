<?php


namespace App\Domain\Users\Providers;

use App\Domain\Users\Database\Factories\UserFactory;
use App\Domain\Users\Database\Migrations\CreatePasswordResetsTable;
use App\Domain\Users\Database\Migrations\CreateUsersTable;
use App\Domain\Users\Database\Seeds\UsersTableSeeder;
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
            CreateUsersTable::class,
            CreatePasswordResetsTable::class
        ]);
    }

    protected function registerModelFactories()
    {
        (new UserFactory())->define();
    }

    protected function registerSeeders()
    {
        $this->seeders([
            UsersTableSeeder::class
        ]);
    }
}
