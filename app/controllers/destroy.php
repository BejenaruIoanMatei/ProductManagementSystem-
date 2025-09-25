<?php

use App\Config\Database;

$config = require base_path('app/config/config.php');
$db = new Database($config['database']);

dd($user);