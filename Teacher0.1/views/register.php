<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Teacher Registration</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form-container">
    <h2 class="form-title">Teacher Registration Form</h2>

    <?php if (isset($_SESSION['register_errors'])): ?>
        <div class="error-box">
            <?php foreach ($_SESSION['register_errors'] as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
        <?php unset($_SESSION['register_errors']); ?>
    <?php endif; ?>

    <form action="../control/registerAction.php" method="post" enctype="multipart/form-data" novalidate>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="<?= htmlspecialchars($_SESSION['old']['fname'] ?? '') ?>" />

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="<?= htmlspecialchars($_SESSION['old']['lname'] ?? '') ?>" />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_SESSION['old']['email'] ?? '') ?>" />

        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" value="<?= htmlspecialchars($_SESSION['old']['birthday'] ?? '') ?>" />

        <label for="gender">Gender:</label><br />
        <input type="radio" id="male" name="gender" value="Male" <?= (($_SESSION['old']['gender'] ?? '') === 'Male') ? 'checked' : '' ?> />
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" <?= (($_SESSION['old']['gender'] ?? '') === 'Female') ? 'checked' : '' ?> />
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="Other" <?= (($_SESSION['old']['gender'] ?? '') === 'Other') ? 'checked' : '' ?> />
        <label for="other">Other</label>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="3"><?= htmlspecialchars($_SESSION['old']['address'] ?? '') ?></textarea>

        <label for="teacherid">Teacher ID:</label>
        <input type="text" id="teacherid" name="teacherid" value="<?= htmlspecialchars($_SESSION['old']['teacherid'] ?? '') ?>" />

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($_SESSION['old']['phone'] ?? '') ?>" />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" />

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" />

        <div class="show-password">
            <input type="checkbox" id="togglePassword" onclick="togglePasswordVisibility()" />
            <label for="togglePassword">Show Passwords</label>
        </div>

        <label for="image">Upload Profile Image:</label>
        <input type="file" id="image" name="image" accept="image/*" />

        <input type="submit" value="Register" />
    </form>
</div>

<script>
function togglePasswordVisibility() {
    const pwd = document.getElementById("password");
    const confirmPwd = document.getElementById("confirm_password");
    const type = pwd.type === "password" ? "text" : "password";
    pwd.type = type;
    confirmPwd.type = type;
}
</script>

</body>
</html>

<?php unset($_SESSION['old']); ?>
