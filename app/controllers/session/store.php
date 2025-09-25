<?php

use App\Core\Authenticator;
use App\Forms\LoginForm;
use App\Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password))
{
    $auth = new Authenticator();

    if($auth->attempt($email, $password))
    {
        redirect('/');
    } else {
        $form->error('email', 'No matching account found for that email and password.');
    }
}

Session::flash('errors', $form->errors());

return redirect('/login/');
