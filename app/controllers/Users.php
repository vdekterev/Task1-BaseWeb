<?php

class Users extends Controller
{
    public function __construct()
    {
    }

    public function register()
    {
        $data = [
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            // errors
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => '',
            'agreed_err' => ''
        ];
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->registerValidator($data);
        } else {
            // load view
        }
        print_r($data);
        $this->view('users/register', $data);

    }

    public function login()
    {
        $data = [
            'email' => '',
            'password' => '',
            // errors
            'email_err' => '',
            'password_err' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
        } else {
            // load view
            $this->view('users/login', $data);
        }
    }

    public function registerValidator($data)
    {
        $data['email'] = trim($_POST['email']);
        $data['password'] = trim($_POST['password']);
        $data['confirm_password'] = trim($_POST['confirm_password']);
        // Email validation
        if (empty($data['email'])) {
            $data['email_err'] = 'Введите адрес электронной почты!';
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $data['email_err'] = 'Некорректный адрес электронной почты!';
        }
        // Password validation
        if (empty($data['password'])) {
            $data['password_err'] = 'Введите пароль!';
        } elseif (!in_array(strlen($data['password']), range(8, 21))) {
            $data['password_err'] = 'Длина пароля от 8 до 20 символов!';
        };
        // Confirm password validation
        if (empty($data['confirm_password']) || $data['password'] !== $data['confirm_password']) {
            $data['confirm_password_err'] = 'Пароли не совпадают!';
        }
        // Agreement validation
        if (!isset($_POST['agreed'])) {
            $data['agreed_err'] = 'Необходимо принять условия соглашения!';
        }
        // Make sure errors are empty
        if (empty($data['email_err'])
            && empty($data['password_err'])
            && empty($data['confirm_password_err'])
            && empty($data['agreed_err'])) {
            // Validated
            die('SUCCESS');
        } else {
            $this->view('users/register', $data);
        }
    }
}