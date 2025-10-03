<?php

use App\Config\Database;

$config = require base_path('app/config/config.php');

$db = new Database($config['database']);

if($_GET['search'] ?? false)
{
    $result_from_search = $db->query('select * from products where name = :name',[
        'name' => $_GET['search']
    ])->find();

    if(! $result_from_search)
    {
        view('search.view.php',[
            'heading' => 'Product not found'
        ]);
        exit();
    }

    view('search_show.view.php',[
        'heading' => 'Product found',
        'product' => $result_from_search
    ]);
    exit();
}

$start = 0;
$rows_per_page = 3;

$records = $db->query('select count(*) from products')->findAllOrFail();

$number_of_records = $records[0]["count(*)"];

$pages = ceil($number_of_records / $rows_per_page);

if(isset($_GET['page-nr']))
{
    $page = $_GET['page-nr'] - 1;
    $start = $page * $rows_per_page;
}

$result = $db->query("select * from products limit $start, $rows_per_page")->findAllOrFail();

$heading = 'Home Page';

view('index.view.php',[
    'products' => $result,
    'heading' => $heading,
    'pages' => $pages
]);