<?php

use App\Config\Database;
use App\Core\Validator;

$config = require base_path('app/config/config.php');
$db = new Database($config['database']);

$errors = [];

if (! Validator::string($_POST['name'], 1, 1000)) {
    $errors['name'] = 'Name needs to be between 1 and 1000 characters';
}

if (! Validator::string($_POST['description'], 1, 1000)) {
    $errors['description'] = 'Description needs to be between 1 and 1000 characters';
}

if (! Validator::number($_POST['price'], 1, 10000)) {
    $errors['price'] = 'WOW THATS TOO MUCH';
}

if (! Validator::number($_POST['in_stock'], 1, 100)) {
    $errors['description'] = 'We cant store this much bro';
}

if (empty($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    $errors['image'] = 'Upload a file not bigger than 5MB';
    $errors['image'] = 'An image file is required';
} else {
    if (! Validator::image($_FILES['image'])) {
        $errors['image'] = 'Upload a valid image (PNG, JPEG, JPG) no bigger than 5MB';
    }
}

if (! Validator::date($_POST['availability_date'])) {
    $errors['availability_date'] = 'Not a correct date';
}

if (! Validator::date($_POST['created_at'])) {
    $errors['created_at'] = 'Not a correct date';
}

if (! empty($errors)) {
    view('create.view.php', [
        'errors' => $errors,
        'heading' => 'Create a New Product'
    ]);
}

$imagePath = Validator::img_verify($_FILES['image']);

if (empty($errors)) {
    $result = $db->query('insert into products(name, description, price, image, availability_date, in_stock, created_at) values (:name, :description, :price, :image, :availability_date, :in_stock, :created_at)',[
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        // 'image' => 'uploads/products/default.jpg',
        'image' => $imagePath,
        'availability_date' => $_POST['availability_date'],
        'in_stock' => $_POST['in_stock'],
        'created_at' => $_POST['created_at']
    ]);
    
    header('location: /');
    exit();
}


