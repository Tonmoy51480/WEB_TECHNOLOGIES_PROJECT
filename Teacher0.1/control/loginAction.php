<?php
session_start();
require_once __DIR__ . '/../model/TeacherDB_mysqli.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

    if (!$email || empty($password)) {
        $_SESSION['login_error'] = "Invalid email or password.";
        header("Location: ../views/login.php");
        exit();
    }

    $db = new TeacherDB_mysqli(); // Use the MySQLi class
    $user = $db->findTeacherByEmail($email);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['teacher'] = [
                'id'        => $user['id'],
                'fname'     => $user['fname'],
                'lname'     => $user['lname'],
                'email'     => $user['email'],
                'teacherid' => $user['teacherid'],
                'image'     => $user['image']
            ];
            header("Location: ../views/dashboard/dashboard.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Incorrect password.";
        }
    } else {
        $_SESSION['login_error'] = "User not found.";
    }

    header("Location: ../views/login.php");
    exit();
} else {
    header("Location: ../views/login.php");
    exit();
}
