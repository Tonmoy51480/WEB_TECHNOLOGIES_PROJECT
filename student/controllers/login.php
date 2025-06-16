<?php
require_once '../models/UserModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize form data
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    $errors = [];
    
   
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]{5,9}$/", $username)) {
        $errors[] = "Username must start with a letter and be 6-10 characters.";
    }
    
    
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }
    
   
    if (empty($errors)) {
        $user = verifyUser($username, $password);
        
        if ($user) {
        
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            
          
            header("Location: ../views/home.php");
            exit();
        } else {
            $errors[] = "Invalid username or password.";
        }
    }
    
    
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<p><a href='javascript:history.back()'>Go back</a></p>";
    }
} else {
  
    header("Location: ../views/login.php");
    exit();
}
?>
