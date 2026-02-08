<?php
require_once __DIR__ . "/../../config/database.php";

class User
{
    public static function create($name, $email, $password)
    {
        $db = Database::connect();
        $stmt = $db->prepare(
            "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'user')"
        );
        return $stmt->execute([
            $name,
            $email,
            password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    public static function findByEmail($email)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAll()
    {
        $db = Database::connect();
        $stmt = $db->query("SELECT id, name, email, role, created_at FROM users ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
