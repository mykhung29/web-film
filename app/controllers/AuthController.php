<?php
session_start();
class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once '../app/models/User.php';
            $userModel = new User();
            $user = $userModel->getByUsername($_POST['username']);
            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: /");
                exit;
            } else {
                $error = "Invalid credentials";
            }
        }
        require_once '../app/views/login.php';
    }
    public function logout() {
        session_start();
        session_destroy();
        header("Location: /login");
        exit;
    }
}
