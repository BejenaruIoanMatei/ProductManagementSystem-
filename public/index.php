<?php 

require __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'app/helpers/functions.php';

// require base_path('app/controllers/index.php');

$config = require base_path('app/config/config.php');

$db = new Database($config['database']);
$result = $db->query('select * from products where id = :id',[
    'id' => 1
])->findOrFail();

$router = new App\Core\Router();

$routes = require base_path('app/routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);