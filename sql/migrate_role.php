<?php
require_once __DIR__ . "/../config/database.php";

try {
    $db = Database::connect();

    // Check if column exists
    $stmt = $db->query("SHOW COLUMNS FROM users LIKE 'role'");
    $exists = $stmt->fetch();

    if (!$exists) {
        $db->exec("ALTER TABLE users ADD COLUMN role VARCHAR(20) DEFAULT 'user'");
        echo "Successfully added 'role' column to users table.\n";
    } else {
        echo "'role' column already exists.\n";
    }

    // Let's make sure there is at least one admin for testing
    // You can delete this later or make a proper seeder
    // $db->exec("UPDATE users SET role='admin' WHERE id=1"); 
    // echo "Updated user with ID 1 to admin (if exists).\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
