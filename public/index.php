<?php 

require __DIR__ . '/../vendor/autoload.php';

const BASE_PATH = __DIR__ . '/../';

session_start();

require BASE_PATH . 'app/helpers/functions.php';

$router = new App\Core\Router();

$routes = require base_path('app/routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);