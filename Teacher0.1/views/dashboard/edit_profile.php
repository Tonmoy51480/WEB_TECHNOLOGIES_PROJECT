<?php
session_start();
<<<<<<< Updated upstream
require_once(__DIR__ . '/../../model/TeacherDB_mysqli.php');

=======
require_once __DIR__ . '/../model/TeacherDB_mysqli.php';
>>>>>>> Stashed changes

if (!isset($_SESSION['teacher']['teacherid'])) {
    header("Location: login.php");
    exit();
}

$db = new TeacherDB_mysqli();
$teacher = $db->findTeacherByTeacherId($_SESSION['teacher']['teacherid']);

if (!$teacher) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $data = [
        'fname'    => trim($_POST['fname'] ?? ''),
        'lname'    => trim($_POST['lname'] ?? ''),
        'email'    => trim($_POST['email'] ?? ''),
        'birthday' => $_POST['birthday'] ?? '',
        'gender'   => $_POST['gender'] ?? '',
        'address'  => trim($_POST['address'] ?? ''),
        'phone'    => trim($_POST['phone'] ?? ''),
    ];

    // Validate required fields (basic)
    if (empty($data['fname']) || empty($data['lname']) || empty($data['email']) || empty($data['birthday']) || empty($data['gender']) || empty($data['address']) || empty($data['phone'])) {
        $error = "Please fill all required fields.";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Password handling
        if (!empty($_POST['password'])) {
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $data['password'] = $teacher['password'];  // Keep existing password
        }

        // Update in DB
        if ($db->updateTeacher($_SESSION['teacher']['teacherid'], $data)) {
            // Optionally update session data
            $_SESSION['teacher']['fname'] = $data['fname'];
            $_SESSION['teacher']['lname'] = $data['lname'];
            $_SESSION['teacher']['email'] = $data['email'];

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Update failed. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Your Profile</h2>
    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" novalidate>
        <input type="text" name="fname" value="<?= htmlspecialchars($teacher['fname']); ?>" required placeholder="First Name">
        <input type="text" name="lname" value="<?= htmlspecialchars($teacher['lname']); ?>" required placeholder="Last Name">
        <input type="email" name="email" value="<?= htmlspecialchars($teacher['email']); ?>" required placeholder="Email">
        <input type="text" name="phone" value="<?= htmlspecialchars($teacher['phone']); ?>" required placeholder="Phone">
        <input type="text" name="address" value="<?= htmlspecialchars($teacher['address']); ?>" required placeholder="Address">
        <input type="date" name="birthday" value="<?= htmlspecialchars($teacher['birthday']); ?>" required>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male" <?= $teacher['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?= $teacher['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
        </select>
        <input type="password" name="password" placeholder="New password (leave blank to keep current)">
        <button type="submit" class="btn">Update</button>
        <a class="btn logout" href="logout.php">Logout</a>
    </form>
</div>
</body>
</html>
