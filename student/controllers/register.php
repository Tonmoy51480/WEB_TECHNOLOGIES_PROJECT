<?php
require_once '../models/UserModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set cookies for last visit and username
    setcookie("last_visit", date("Y-m-d H:i:s"), time() + (86400 * 30), '/');
    if (isset($_POST['username'])) {
        setcookie("saved_username", $_POST['username'], time() + (86400 * 30), '/');
    }
    
   
    $userData = [
        'username' => trim($_POST['username'] ?? ''),
        'password' => trim($_POST['password'] ?? ''),
        'fullName' => trim($_POST['full_name'] ?? ''),
        'dob' => trim($_POST['dob'] ?? ''),
        'gender' => $_POST['gender'] ?? null,
        'education' => $_POST['education'] ?? null,
        'address' => trim($_POST['address'] ?? ''),
        'city' => trim($_POST['city'] ?? ''),
        'zip' => trim($_POST['zip'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'comments' => trim($_POST['comments'] ?? '')
    ];
    
    $errors = [];
    
    
    if (
        $userData['username'] === '' || $userData['password'] === '' || $userData['fullName'] === '' ||
        $userData['dob'] === '' || $userData['gender'] === null || $userData['education'] === null ||
        $userData['address'] === '' || $userData['city'] === '' || $userData['zip'] === '' || $userData['phone'] === ''
    ) {
        $errors[] = "Please fill out all fields.";
    }
    
    
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]{5,9}$/", $userData['username'])) {
        $errors[] = "Username must start with a letter and be 6 to 10 characters.";
    }
    
    
    if (usernameExists($userData['username'])) {
        $errors[] = "Username already exists.";
    }
    
   
    if (strlen($userData['password']) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }
    
    
    if (!preg_match("/^[a-zA-Z\s]+$/", $userData['city'])) {
        $errors[] = "City name must have letters only.";
    }
    
   
    if (!preg_match("/^[0-9]{11}$/", $userData['phone'])) {
        $errors[] = "Phone number must be exactly 11 digits.";
    }
    
    
    if (empty($errors)) {
        if (registerUser($userData)) {
            echo "<h2 style='color:green;'>Registration successful!</h2>";
            echo "<p><a href='../views/login.php'>Login Now</a></p>";
        } else {
            echo "<p style='color:red;'>Registration failed. Please try again.</p>";
        }
    } else {
       
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<p><a href='javascript:history.back()'>Go back</a></p>";
    }
} else {
  
    header("Location: ../views/register.php");
    exit();
}
?>
