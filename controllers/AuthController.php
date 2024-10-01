<?php
require_once ROOT_PATH . 'models/User.php';

class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: index.php?action=dashboard');
            } else {
                $error = "Invalid username or password";
                require '../views/auth/login.php';
            }
        } else {
            require '../views/auth/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->register($username, $email, $password)) {
                header('Location: index.php?action=login');
            } else {
                $error = "Error registering user";
                require '../views/auth/register.php';
            }
        } else {
            require '../views/auth/register.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?action=login');
    }
}