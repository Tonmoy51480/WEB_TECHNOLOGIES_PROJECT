<?php
require_once '../config.php';


function usernameExists($username) {
    global $conn;
    $sql = "SELECT username FROM accounts WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}


function registerUser($userData) {
    global $conn;
    $sql = "INSERT INTO accounts (username, password, fullname, dob, gender, education, address, city, zip, phone, comments) 
            VALUES ('{$userData['username']}', '{$userData['password']}', '{$userData['fullName']}', 
                    '{$userData['dob']}', '{$userData['gender']}', '{$userData['education']}', 
                    '{$userData['address']}', '{$userData['city']}', '{$userData['zip']}', 
                    '{$userData['phone']}', '{$userData['comments']}')";
    
    return mysqli_query($conn, $sql);
}


function verifyUser($username, $password) {
    global $conn;
    $sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}
?>
