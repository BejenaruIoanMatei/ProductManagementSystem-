<?php

use App\Config\Database;

$config = require base_path('app/config/config.php');
$db = new Database($config['database']);

$product = $db->query('select * from products where id = :id',[
    'id' => $_POST['id']
])->findOrFail();

$db->query('delete from products where id = :id',[
    'id' => $product['id']
]);

header('location: /');
exit();