<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Student Registration Form</h1>
    <form action="action.php" method="post">
        <h2>Personal Information</h2>
        
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" required><br>
        
        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required><br>
        
        <label>Gender:</label><br>
        
        <label for="male">Male</label>
        <input type="radio" id="male" name="gender" value="male">
        
        <label for="female">Female</label>
        <input type="radio" id="female" name="gender" value="female"></label>
        <br>
        
        <label>Education Status:</label><br>
        <label for="school">School</label>
        <input type="radio" id="school" name="education" value="school">
        <label for="college">College</label>
        <input type="radio" id="college" name="education" value="college">
        <label for="bachelors">Bachelors</label>
        <input type="radio" id="bachelors" name="education" value="bachelors">
        <label for="masters">Masters</label>
        <input type="radio" id="masters" name="education" value="masters">
        <label for="phd">PhD</label>
        <input type="radio" id="phd" name="education" value="phd">
        <br><br>
        
        <h2>Contact Information</h2>
        
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br>
        
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" required><br>
        
        <label for="zip">ZIP Code:</label><br>
        <input type="text" id="zip" name="zip" required><br><br>
        
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>
        
        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments" rows="4"></textarea><br><br>
        
        <button type="submit">Register</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
