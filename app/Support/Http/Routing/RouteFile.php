<?php


namespace App\Support\Http\Routing;

abstract class RouteFile
{
    /**
     * @var array
     */
    protected $options;

    /**
     * @var \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * RouteFile constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;

        $this->router = app('router');
    }

    public function register()
    {
        $this->router->group($this->options, function () {
            $this->routes();
        });
    }

    abstract protected function routes();
}
