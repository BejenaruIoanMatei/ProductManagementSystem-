<?php

use App\Config\Database;

$config = require base_path('app/config/config.php');

$db = new Database($config['database']);
$result = $db->query('select * from products')->findAllOrFail();

view('index.view.php',[
    'products' => $result
]);