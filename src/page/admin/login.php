<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../../css/admin/login.css">
</head>
<body>
    <div class="container">
        <div>
            <h2>Admin Login</h2>
            <form>
                <label for="login-email">Name</label>
                <input type="text" id="login-name" name="name" placeholder="Enter your name" required>

                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" placeholder="Enter your password" required>

                <button type="submit" onclick="login()">Login</button>
            </form>
        </div>
    </div>
    <script src=""></script>
</body>
</html>