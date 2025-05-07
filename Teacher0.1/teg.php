<?php
$hasError = false;
$errorMessages = [];

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Collect and sanitize inputs
    $fname        = trim($_POST["fname"]);
    $lname        = trim($_POST["lname"]);
    $email        = trim($_POST["email"]);
    $birthday     = $_POST["birthday"];
    $gender       = $_POST["gender"] ?? '';
    $address      = trim($_POST["address"]);
    $teacherid    = trim($_POST["teacherid"]);
    $phone        = trim($_POST["phone"]);
    $password     = $_POST["password"];
    $confPassword = $_POST["confirm_password"];

    // Validate inputs
    if (empty($fname))         { $hasError = true; $errorMessages[] = "First Name is required."; }
    if (empty($lname))         { $hasError = true; $errorMessages[] = "Last Name is required."; }
    if (empty($email))         { $hasError = true; $errorMessages[] = "Email is required."; }
    if (empty($birthday))      { $hasError = true; $errorMessages[] = "Birthday is required."; }
    if (empty($gender))        { $hasError = true; $errorMessages[] = "Gender is required."; }
    if (empty($address))       { $hasError = true; $errorMessages[] = "Address is required."; }
    if (empty($teacherid))     { $hasError = true; $errorMessages[] = "Teacher ID is required."; }
    if (empty($phone))         { $hasError = true; $errorMessages[] = "Phone Number is required."; }
    if (empty($password))      { $hasError = true; $errorMessages[] = "Password is required."; }
    if (empty($confPassword))  { $hasError = true; $errorMessages[] = "Confirm Password is required."; }

    // Check password match
    if ($password !== $confPassword) {
        $hasError = true;
        $errorMessages[] = "Passwords do not match.";
    }

    // If everything is OK, show submitted data
    if (!$hasError) {
        echo "<h2>✅ Teacher Registration Successful</h2>";
        echo "<p><strong>First Name:</strong> $fname</p>";
        echo "<p><strong>Last Name:</strong> $lname</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Birthday:</strong> $birthday</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Teacher ID:</strong> $teacherid</p>";
        echo "<p><strong>Phone Number:</strong> $phone</p>";
        // Don't display password publicly!
    } else {
        foreach ($errorMessages as $msg) {
            echo "<p style='color:red;'>❌ $msg</p>";
        }
    }
} else {
    echo "<p>No form data submitted.</p>";
}
?>
