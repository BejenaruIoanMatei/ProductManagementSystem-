<?php 

$router->get('/products/create', 'create.php');

$router->post('/products', 'store.php');
$router->get('/', 'index.php');

// $router->get('/product/edit', '/edit.php');
$router->get('/product', 'show.php');

$router->get('/login/', 'session/create.php');
$router->post('/session', 'session/store.php');

