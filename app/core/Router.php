<?php

namespace App\Core;
use App\Core\Middleware\Middleware;

class Router
{
    /**
     * @var array registered routes
     */
    protected $routes = [];

    /**
     * Adds a new route to the registered ones (registers a new one)
     * 
     * @param string $method
     * @param string $uri
     * @param string $controller
     * middleware set to null
     * 
     * @return self
     */
    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
            'middleware' => null
        ];

        return $this;
    }

    /**
     * Attaches middleware to the last registered route
     * 
     * @param string $key 'auth' or 'guest'
     * 
     * @return self
     */
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    /**
     * GET
     * 
     * @param string $uri
     * @param string $controller
     * 
     * @return self
     */
    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    /**
     * POST
     * 
     * @param string $uri
     * @param string $controller
     * 
     * @return self
     */
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    /**
     * DELETE
     * 
     * @param string $uri
     * @param string $controller
     * 
     * @return self
     */
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    /**
     * PUT
     * 
     * @param string $uri
     * @param string $controller
     * 
     * @return self
     */
    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    /**
     * Gets the corresponding route to a HTTP request
     * 
     * @param string $uri
     * @param string $method
     * 
     * @return mixed
     */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri and $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);
                return require base_path('app/controllers/' . $route['controller']);
            }
        }
        $this->abort(Response::NOT_FOUND);
    }

    /**
     * @param int $code
     * 
     * @return never
     */
    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("app/views/$code.php");

        die();
    }
}