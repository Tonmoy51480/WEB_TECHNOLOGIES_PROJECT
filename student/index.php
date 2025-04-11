<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
    <h1>Student Registration Form</h1>

    <form>
        <h2>Personal Information</h2>

        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" required><br><br>

        <br>

        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required><br><br>

        <br>

        <label>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br><br>

        <br>

        <label>Education Status:</label><br>
        <input type="radio" id="school" name="education" value="school">
        <label for="school">School</label>

        <input type="radio" id="college" name="education" value="college">
        <label for="college">College</label>

        <input type="radio" id="bachelors" name="education" value="bachelors">
        <label for="bachelors">Bachelors</label>

        <input type="radio" id="masters" name="education" value="masters">
        <label for="masters">Masters</label>

        <input type="radio" id="phd" name="education" value="phd">
        <label for="phd">PhD</label><br><br>

        <br>

        <h2>Contact Information</h2>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br><br>

        <br>

        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" required><br><br>

        <br>

        <label for="zip">ZIP Code:</label><br>
        <input type="text" id="zip" name="zip" required><br><br>

        <br>

        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>

        <br>

        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments" rows="4"></textarea><br><br>

        <br>

        <button type="submit">Register</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
