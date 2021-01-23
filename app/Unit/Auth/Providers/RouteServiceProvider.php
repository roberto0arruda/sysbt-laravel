<?php

namespace App\Unit\Auth\Providers;

use App\Unit\Auth\Http\Routes\Api;
use App\Unit\Auth\Http\Routes\Web;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Unit\Auth\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/admin/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        (new Web([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ]))->register();
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        (new Api([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api/auth',
            'as' => 'api.auth.'
        ]))->register();
    }
}
