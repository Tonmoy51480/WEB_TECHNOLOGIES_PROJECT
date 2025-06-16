<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body>
    <h1>Student Login</h1>
    <form action="../controllers/login.php" method="post" novalidate>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <button type="submit">Login</button>
        <button type="button" onclick="clearFields()">Clear</button>
    </form>

    <p style="text-align: center; margin-top: 20px;">
        Don't have an account? <a href="register.php">Register here</a>
    </p>

    <script src="../assets/js/loginval.js"></script>
</body>
</html>
