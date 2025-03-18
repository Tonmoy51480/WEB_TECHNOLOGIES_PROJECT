
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Student Registration</h2>
    <form action="#" method="post">
        <fieldset>
            <legend>Student Information</legend>
            <table>
                <tr>
                    <td><label for="first_name">First Name:</label></td>
                    <td><input type="text" id="first_name" name="first_name" required></td>
                </tr>
                <tr>
                    <td><label for="last_name">Last Name:</label></td>
                    <td><input type="text" id="last_name" name="last_name" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td><input type="text" id="gender" name="gender"></td>
                </tr>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" required></td>
                </tr>
                <tr>
                    <td><label>Education Level:</label></td>
                    <td>
                        <input type="checkbox" id="school" name="education_level" value="School">
                        <label for="school">School</label>
                        <input type="checkbox" id="college" name="education_level" value="College">
                        <label for="college">College</label>
                        <input type="checkbox" id="university" name="education_level" value="University">
                        <label for="university">University</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="institution_name">Institution Name:</label></td>
                    <td><input type="text" id="institution_name" name="institution_name" required></td>
                </tr>
                <tr>
                    <td><label for="student_id">Student ID:</label></td>
                    <td><input type="text" id="student_id" name="student_id" required></td>
                </tr>
                <tr>
                    <td><label for="city">City:</label></td>
                    <td><input type="text" id="city" name="city" required></td>
                </tr>
                <tr>
                    <td><label for="phone_number">Phone Number:</label></td>
                    <td><input type="tel" id="phone_number" name="phone_number" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Register"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>
