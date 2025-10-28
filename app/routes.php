<?php 

$router->get('/products/create', 'create.php')->only('auth');
$router->post('/products', 'store.php');
$router->get('/product', 'show.php');
$router->delete('/product', 'destroy.php')->only('auth');
$router->get('/product/edit', 'edit.php')->only('auth');
$router->put('/product', 'update.php')->only('auth');

$router->get('/', 'index.php');

$router->get('/login/', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php');
$router->get('/check_session', 'session/check_session.php');

# endpoint for testing some javascript functionalities

$router->get('/javascript', 'test_js/index.php');
$router->post('/javascript', 'test_js/store.php');