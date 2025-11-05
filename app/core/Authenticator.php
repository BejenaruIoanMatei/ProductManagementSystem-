<?php

namespace App\Core;

use App\Config\Database;
use App\Core\Session;

class Authenticator
{
    /**
     * @param string $email user email
     * @param string $password user password
     * 
     * @return mixed boolean if there is a user with the given email
     *               void if there is no match for the given email
     */
    public function attempt($email, $password)
    {
        $config = require base_path('app/config/config.php');

        $db = new Database($config['database']);

        $user = $db->query('select * from users where email = :email',[
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }
    }

    /**
     * @param array $user ['email' => 'example@gmail.com']
     * 
     * @return void 
     */
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(
            delete_old_session: true
        );
    }

    /**
     * @return void
     */
    public function logout()
    {
        Session::destroy();
    }
}