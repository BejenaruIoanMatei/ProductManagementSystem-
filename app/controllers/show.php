<?php

use App\Config\Database;

$config = require base_path('app/config/config.php');

$db = new Database($config['database']);

$currentProductID = $_GET['id'];

$product = $db->query('select * from products where id = :id',[
    'id' => $currentProductID
])->findAllOrFail();

$heading = 'Product Display';

view('show.view.php', [
    'product' => $product,
    'heading' => $heading
]);