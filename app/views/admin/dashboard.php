<?php
$users = User::getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Fullstack App</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="dashboard-container admin-panel">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <a href="?page=login&action=logout" class="btn-secondary">Logout</a>
        </div>

        <p>Welcome, Admin <strong>
                <?php echo htmlspecialchars($_SESSION['user']['name']); ?>
            </strong></p>

        <div class="card-table">
            <h3>Registered Users</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u): ?>
                        <tr>
                            <td>#
                                <?php echo $u['id']; ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($u['name']); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($u['email']); ?>
                            </td>
                            <td><span class="badge <?php echo $u['role']; ?>">
                                    <?php echo ucfirst($u['role']); ?>
                                </span></td>
                            <td>
                                <?php echo date('M d, Y', strtotime($u['created_at'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>