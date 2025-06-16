<?php
require_once '../config.php';


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['fullname']); ?>!</h1>
        <p>You are successfully logged in.</p>
        <p>Username: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        
        <p><a href="logout.php" style="color: red;">Logout</a></p>
    </div>
</body>
</html>
