<?php

/**
 * User Controller
 */
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    /**
     * @return void
     */
    public function register(): void
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
            $data = $this->registerValidator($data);
            $errors = array($data['email_err'], $data['password_err'], $data['confirm_password_err'], $data['agreed_err']);
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            if (empty(array_filter($errors)) && $this->userModel->userRegister($data)) {
                flashMessage('register_success', 'Вы успешно зарегистрированы!');
                url_redirect('users/login');
            }
        }
        $this->view('users/register', $data);
    }

    /**
     * @return void
     */
    public function login(): void
    {
        $data = [
            'email' => '',
            'password' => '',
            // errors
            'email_err' => '',
            'password_err' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->loginValidator($data);
        } else {
            // load view
            $this->view('users/login', $data);
        }
    }

    /**
     * Register Validator
     * @param array $data
     * @return array
     */
    public function registerValidator(array $data): array
    {
        $data['email'] = trim($_POST['email']);
        $data['password'] = trim($_POST['password']);
        $data['confirm_password'] = trim($_POST['confirm_password']);
        // Email validation
        if (empty($data['email'])) {
            $data['email_err'] = 'Введите адрес электронной почты!';
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_err'] = 'Некорректный адрес электронной почты!';
        } else if ($this->userModel->userExists($data['email'])) {
            $data['email_err'] = 'Пользователь с таким email уже существует';
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
        return $data;
    }

    /**
     * Login Validator
     * @param array $data
     * @return void
     */
    public function loginValidator(array $data): void
    {
        $data['email'] = trim($_POST['email']);
        $data['password'] = trim($_POST['password']);
        // Email validation
        if (empty($data['email'])) {
            $data['email_err'] = 'Введите адрес электронной почты!';
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_err'] = 'Некорректный адрес электронной почты!';
        } else if (!$this->userModel->userExists($data['email'])) {
            $data['email_err'] = 'Пользователь не найден';
        }
        // Make sure errors are empty

        if ((empty($data['email_err']) && empty($data['password_err']))) {
            // Validated
            die('Success');

        } else {
            $this->view('users/login', $data);
        }
    }
}