<?php

use App\Core\Session;

view('create.view.php', [
    'errors' => Session::get('errors')
]);