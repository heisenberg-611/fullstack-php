<?php
class AuthController
{
    public function register()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($name && $email && $password) {
            if (User::create($name, $email, $password)) {
                // Success - redirect to login
                header("Location: ?page=login");
                exit;
            } else {
                // Failure (maybe email exists)
                // In a real app, flash a message. For now, just redirect back.
                header("Location: ?page=register&error=registration_failed");
                exit;
            }
        }
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);
        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user;
            if ($user['role'] === 'admin') {
                header("Location: ?page=admin_dashboard");
            } else {
                header("Location: ?page=dashboard");
            }
            exit;
        } else {
            header("Location: ?page=login&error=invalid_credentials");
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: ?page=login");
        exit;
    }
}
