<?php session_start();
if (isset($_SESSION['teacher_email'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Teacher Login</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div class="form-container">
    <h2 class="form-title">Teacher Login</h2>

    <?php if (isset($_SESSION['login_error'])): ?>
        <div class="error-box">
            <?= htmlspecialchars($_SESSION['login_error']) ?>
        </div>
        <?php unset($_SESSION['login_error']); ?>
    <?php endif; ?>

    <form action="../control/loginAction.php" method="post" novalidate autocomplete="off">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_SESSION['old']['email'] ?? '') ?>" />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" />

        <div class="show-password">
            <input type="checkbox" id="togglePassword" onclick="togglePasswordVisibility()" />
            <label for="togglePassword">Show Password</label>
        </div>

        <input type="submit" value="Login" />
    </form>
</div>

<script>
function togglePasswordVisibility() {
    const pwd = document.getElementById("password");
    pwd.type = pwd.type === "password" ? "text" : "password";
}
</script>

</body>
</html>

<?php unset($_SESSION['old']); ?>
