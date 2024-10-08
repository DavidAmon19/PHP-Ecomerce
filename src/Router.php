<?php

namespace App;

class Router
{
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function handleRequest(string $uri)
    {
        $cleanUri = parse_url($uri, PHP_URL_PATH);

        if (!isset($this->routes[$cleanUri])) {
            http_response_code(404);
            echo "Página não encontrada!";
            exit;
        }

        $route = $this->routes[$cleanUri];
        $controllerName = $route['controller'];
        $methodName = $route['method'];

        $controller = new $controllerName();
        $controller->$methodName();
    }
}
