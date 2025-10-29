<?php

namespace App\Forms;
use App\Core\Validator;

class LoginForm
{
    protected $errors = [];

    /**
     * Validates email and password
     * 
     * @param string $email
     * @param string $password
     * 
     * @return bool
     */
    public function validate($email, $password)
    {
        if (! Validator::email($email))
        {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (! Validator::string($password))
        {
            $this->errors['password'] = 'Provide a valid password.';
        }
        return empty($this->errors);
    }

    /**
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Sets the error message for a specific field
     * 
     * @param string $field
     * @param string $message
     * 
     * @return void
     */
    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}