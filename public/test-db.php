<?php
require "../config/database.php";

$db = Database::connect();
$stmt = $db->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($users);
