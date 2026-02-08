<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$basePath = dirname(__DIR__); // fullstack-php

// Autoload (simple) or Manual Includes
require_once $basePath . "/config/database.php";
require_once $basePath . "/app/models/User.php";
require_once $basePath . "/app/controllers/AuthController.php";

$page = $_GET["page"] ?? "login";
$action = $_GET["action"] ?? null;

// Handle Actions (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action) {
    $auth = new AuthController();
    if ($action === 'register') {
        $auth->register();
    } elseif ($action === 'login') {
        $auth->login();
    } elseif ($action === 'logout') {
        $auth->logout();
    }
    exit;
}

// Handle Views (GET)
switch ($page) {
    case "register":
        require $basePath . "/app/views/auth/register.php";
        break;

    case "admin_dashboard":
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: ?page=login");
            exit;
        }
        require $basePath . "/app/views/admin/dashboard.php";
        break;

    case "dashboard":
        if (!isset($_SESSION['user'])) {
            header("Location: ?page=login");
            exit;
        }
        // Redirect admin to admin dashboard if they try to access user dashboard
        if ($_SESSION['user']['role'] === 'admin') {
            header("Location: ?page=admin_dashboard");
            exit;
        }
        require $basePath . "/app/views/dashboard.php";
        break;

    case "login":
    default:
        require $basePath . "/app/views/auth/login.php";
}
