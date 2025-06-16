<?php

if (isset($_COOKIE['last_visit'])) {
    echo "<p style='color: blue; text-align: center;'>Your last visit was on: " . $_COOKIE['last_visit'] . "</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
    <h1>Student Registration Form</h1>
    <form action="../controllers/register.php" method="post" novalidate>
        <h2>Personal Information</h2>

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $_COOKIE['saved_username'] ?? ''; ?>"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>

        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name"><br>

        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob"><br>

        <label>Gender:</label>
        <div class="radio-group">
            <label for="male"><input type="radio" id="male" name="gender" value="male"> Male</label>
            <label for="female"><input type="radio" id="female" name="gender" value="female"> Female</label>
        </div>

        <label>Education Status:</label>
        <div class="radio-group">
            <label for="school"><input type="radio" id="school" name="education" value="school"> School</label>
            <label for="college"><input type="radio" id="college" name="education" value="college"> College</label>
            <label for="bachelors"><input type="radio" id="bachelors" name="education" value="bachelors"> Bachelors</label>
            <label for="masters"><input type="radio" id="masters" name="education" value="masters"> Masters</label>
            <label for="phd"><input type="radio" id="phd" name="education" value="phd"> PhD</label>
        </div>

        <h2>Contact Information</h2>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>

        <label for="city">City:</label><br>
        <input type="text" id="city" name="city"><br>

        <label for="zip">ZIP Code:</label><br>
        <input type="text" id="zip" name="zip"><br><br>

        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone"><br><br>

        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments" rows="4"></textarea><br><br>

        <button type="submit">Register</button>
        <button type="reset">Reset</button>
        <button type="button" onclick="window.location.href='login.php'">Login</button>
    </form>

    <script src="../assets/js/validation.js"></script>
</body>
</html>
