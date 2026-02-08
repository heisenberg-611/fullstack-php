<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Fullstack App</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="auth-card">
            <h2>Welcome Back</h2>
            <form method="POST" action="?action=login">
                <div class="form-group">
                    <input name="email" type="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input name="password" type="password" placeholder="Password" required>
                </div>
                <button class="btn-primary">Login</button>
            </form>
            <p class="auth-link">New here? <a href="?page=register">Create an account</a></p>
        </div>
    </div>

</body>

</html>