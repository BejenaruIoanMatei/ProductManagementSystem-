<?php

use App\Config\Database;

$config = require base_path('app/config/config.php');

$db = new Database($config['database']);
$result = $db->query('select * from products')->findAllOrFail();

$heading = 'Home Page';

view('index.view.php',[
    'products' => $result,
    'heading' => $heading
]);