<?php
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Fullstack App</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="dashboard-container">
    <div class="header">
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
        <a href="?page=login&action=logout" class="btn-secondary">Logout</a>
    </div>

    <div class="card-grid">
        <div class="card">
            <h3>My Profile</h3>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Member since:</strong> <?php echo date('F j, Y', strtotime($user['created_at'])); ?></p>
            <p><strong>Status:</strong> <span class="badge user">Active Member</span></p>
        </div>
        
        <div class="card">
            <h3>Recent Activity</h3>
            <p>No recent activity to show.</p>
        </div>
    </div>
</div>

<style>
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    .card {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
    }
    .card h3 {
        margin-bottom: 10px;
        color: var(--primary-color);
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

</body>
</html>