<?php
require_once '../vendor/autoload.php';

use App\Router;

$routes = require '../routes.php';

$router = new Router($routes);

$uri = $_SERVER['REQUEST_URI'];
$router->handleRequest($uri);
