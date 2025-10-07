<?php

use App\Config\Database;
use App\Core\Validator;

$errors = [];

$config = require base_path('app/config/config.php');

$db = new Database($config['database']);

$product = $db->query('select * from products where id = :id',[
    'id' => $_POST['id']
])->findOrFail();

if (! Validator::string($_POST['name'], 1, 1000))
{
    $errors['name'] = 'Name needs to be between 50 and 100 characters';
}

if (! Validator::string($_POST['description'], 1, 1000))
{
    $errors['description'] = 'Description needs to be between 100 and 200 characters';
}

if (! Validator::number($_POST['price'], 1, 1000))
{
    $errors['price'] = 'WOW THATS TOO MUCH';
}

if (! Validator::number($_POST['in_stock'], 1, 1000))
{
    $errors['description'] = 'We cant store this much bro';
}

if (empty($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK)
{
    $errors['image'] = 'Upload a file not bigger than 5MB';
    $errors['image'] = 'An image file is required';
} else {
    if (! Validator::image($_FILES['image']))
    {
        $errors['image'] = 'Upload a valid image (PNG, JPEG, JPG) no bigger than 5MB';
    }
}

if (! Validator::date($_POST['availability_date']))
{
    $errors['availability_date'] = 'Not a correct date';
}

if (! Validator::date($_POST['created_at']))
{
    $errors['created_at'] = 'Not a correct date';
}

if (! empty($errors))
{
    view('edit.view.php', [
        'errors' => $errors,
        'product' => $product
    ]);
}


if (empty($errors)) {
    $db->query(
        'UPDATE products 
         SET name = :name,
             description = :description,
             price = :price,
             image = :image,
             availability_date = :availability_date,
             in_stock = :in_stock,
             created_at = :created_at
         WHERE id = :id',
        [
            'id' => $_POST['id'],
            'name' => !empty($_POST['name']) ? $_POST['name'] : $product['name'],
            'description' => !empty($_POST['description']) ? $_POST['description'] : $product['description'],
            'price' => !empty($_POST['price']) ? $_POST['price'] : $product['price'],
            'image' => 'uploads/products/default.jpg',
            'availability_date' => !empty($_POST['availability_date']) ? $_POST['availability_date'] : $product['availability_date'],
            'in_stock' => isset($_POST['in_stock']) ? $_POST['in_stock'] : $product['in_stock'],
            'created_at' => !empty($_POST['created_at']) ? $_POST['created_at'] : $product['created_at'],
        ]
    );

    header("Location: /product?id=" . $_POST['id']);
    exit;
}
