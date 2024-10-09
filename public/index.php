<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;

$routes = require __DIR__ . '/../routes.php';

$router = new Router($routes);

$uri = $_SERVER['REQUEST_URI'];

$router->handleRequest($uri);
