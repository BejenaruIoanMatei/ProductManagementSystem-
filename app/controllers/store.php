<?php

use App\Config\Database;

$config = require base_path('app/config/config.php');

$db = new Database($config['database']);
$result = $db->query('insert into products(name, description, price, image, availability_date, in_stock, created_at) values (:name, :description, :price, :image, :availability_date, :in_stock, :created_at)',[
    'name' => $_POST['name'],
    'description' => $_POST['description'],
    'price' => $_POST['price'],
    'image' => 'uploads/products/default.jpg',
    'availability_date' => $_POST['availability_date'],
    'in_stock' => $_POST['in_stock'],
    'created_at' => $_POST['created_at']
]);

header('location: /');
exit();

