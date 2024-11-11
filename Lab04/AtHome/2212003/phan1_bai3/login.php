<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: info.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
    if ($username == 'user' && $password == 'pass') {
        $_SESSION['username'] = $username;

        if ($remember) {
            setcookie('username', $username, time() + (86400 * 30), "/"); // 30 days
        }

        header("Location: info.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login Page</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form action="login.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>