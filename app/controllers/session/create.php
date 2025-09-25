<?php

use App\Core\Session;

view('session.view.php',[
    'errors' => Session::get('errors')
]);