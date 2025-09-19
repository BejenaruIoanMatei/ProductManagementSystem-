<?php 

require __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'app/helpers/functions.php';

// require base_path('app/controllers/index.php');

$config = require base_path('app/config/config.php');

$db = new Database($config['database']);
$result = $db->query('select * from products where id = :id',[
    'id' => 2
])->findOrFail();

dd($result);
