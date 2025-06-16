<?php
session_start();
require_once __DIR__ . '/../model/TeacherDB_mysqli.php';

function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fname        = clean_input($_POST["fname"] ?? '');
    $lname        = clean_input($_POST["lname"] ?? '');
    $email        = clean_input($_POST["email"] ?? '');
    $birthday     = $_POST["birthday"] ?? '';
    $gender       = $_POST["gender"] ?? '';
    $address      = clean_input($_POST["address"] ?? '');
    $teacherid    = clean_input($_POST["teacherid"] ?? '');
    $phone        = clean_input($_POST["phone"] ?? '');
    $password     = $_POST["password"] ?? '';
    $confPassword = $_POST["confirm_password"] ?? '';
    $image        = $_FILES['image'] ?? null;

    $_SESSION['old'] = [
        'fname'     => $fname,
        'lname'     => $lname,
        'email'     => $email,
        'birthday'  => $birthday,
        'gender'    => $gender,
        'address'   => $address,
        'teacherid' => $teacherid,
        'phone'     => $phone
    ];

    $errors = [];

    if (empty($fname))        $errors[] = "First Name is required.";
    if (empty($lname))        $errors[] = "Last Name is required.";
    if (empty($email))        $errors[] = "Email is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (empty($birthday))     $errors[] = "Birthday is required.";
    if (empty($gender))       $errors[] = "Gender is required.";
    if (empty($address))      $errors[] = "Address is required.";
    if (empty($teacherid))    $errors[] = "Teacher ID is required.";
    if (empty($phone))        $errors[] = "Phone number is required.";
    if (!preg_match("/^[0-9]{10,15}$/", $phone)) $errors[] = "Phone number must be 10–15 digits.";
    if (empty($password))     $errors[] = "Password is required.";
    if ($password !== $confPassword) $errors[] = "Passwords do not match.";

    $imageName = null;
    if (isset($image) && $image['error'] !== UPLOAD_ERR_NO_FILE) {
        $check = getimagesize($image["tmp_name"]);
        if ($check === false) {
            $errors[] = "Uploaded file is not a valid image.";
        } else {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $fileType = mime_content_type($image['tmp_name']);
            if (!in_array($fileType, $allowedTypes)) {
                $errors[] = "Only JPG, PNG, and GIF files are allowed.";
            } else {
                $uploadDir = __DIR__ . '/../upload/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $imageName = uniqid('img_') . '_' . basename($image['name']);
                $uploadFile = $uploadDir . $imageName;
                if (!move_uploaded_file($image['tmp_name'], $uploadFile)) {
                    $errors[] = "Failed to upload image.";
                }
            }
        }
    }

    $db = new TeacherDB_mysqli();

    if ($db->emailExists($email)) {
        $errors[] = "Email is already registered.";
    }
    if ($db->teacherIdExists($teacherid)) {
        $errors[] = "Teacher ID is already registered.";
    }

    if (!empty($errors)) {
        $_SESSION['register_errors'] = $errors;
        header("Location: ../view/register.php");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $saveData = [
        'fname'     => $fname,
        'lname'     => $lname,
        'email'     => $email,
        'birthday'  => $birthday,
        'gender'    => $gender,
        'address'   => $address,
        'teacherid' => $teacherid,
        'phone'     => $phone,
        'password'  => $hashedPassword,
        'image'     => $imageName
    ];

    if ($db->saveTeacher($saveData)) {
        unset($_SESSION['old']);
        header("Location: ../view/login.php?success=1");
        exit();
    } else {
        $_SESSION['register_errors'] = ["Failed to save your data. Please try again."];
        header("Location: ../view/register.php");
        exit();
    }
} else {
    echo "No form submitted.";
}
