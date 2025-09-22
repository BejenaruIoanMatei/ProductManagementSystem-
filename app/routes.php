<?php 

$router->get('/products/create', '/create.php');

$router->post('/products', '/store.php');
$router->get('/', '/index.php');