<?php 
session_start();
if (!isset($_SESSION['username'])) {
    if(isset($_COOKIE['username'])) {
        $_SESSION['username'] = $_COOKIE['username'];
    }
    else {
        header("Location: login.php");
        exit();
    }
}
$username=$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <a href="logout.php">Logout</a>
</body>
</html>