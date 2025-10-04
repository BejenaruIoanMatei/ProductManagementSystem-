<?php

use App\Config\Database;

$config = require base_path('app/config/config.php');

$db = new Database($config['database']);

$product = $db->query('select * from products where id = :id',[
    'id' => $_GET['id']
])->findOrFail();

$heading = 'Edit product';

view('edit.view.php',[
    'errors' => [],
    'heading' => $heading,
    'product' => $product
]);