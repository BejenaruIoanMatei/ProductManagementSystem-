<?php

use App\Config\Database;

$config = require base_path('app/config/config.php');

$db = new Database($config['database']);

$currentProductID = $_GET['id'];

$product = $db->query('select * from products where id = :id',[
    'id' => $currentProductID
])->findAllOrFail();

view('show.view.php', [
    'product' => $product
]);