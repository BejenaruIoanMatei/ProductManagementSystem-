<?php

namespace App\Core;

use App\Config\Database;
use App\Core\Session;

class Authenticator
{
    public function attempt($email, $password)
    {
        $config = require base_path('app/config/config.php');

        $db = new Database($config['database']);

        $user = $db->query('select * from users where email = :email',[
            'email' => $email
        ])->find();

        if ($user)
        {
            if (password_verify($password, $user['password']))
            {
                $this->login([
                    'email' => $email
                ]);

                return true;

            }
        }
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(
            delete_old_session: true
        );

    }

    public function logout()
    {
        Session::destroy();
    }
}