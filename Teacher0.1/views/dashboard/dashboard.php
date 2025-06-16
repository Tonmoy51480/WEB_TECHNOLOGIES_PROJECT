<?php
session_start();
require_once 'TeacherDB_mysqli.php';

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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?= htmlspecialchars($teacher['fname']); ?>!</h2>
    <?php if (!empty($teacher['image'])): ?>
        <img src="uploads/<?= htmlspecialchars($teacher['image']); ?>" alt="Profile Image" width="150">
    <?php endif; ?>
    <p><strong>Email:</strong> <?= htmlspecialchars($teacher['email']); ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($teacher['phone']); ?></p>
    <p><strong>Address:</strong> <?= htmlspecialchars($teacher['address']); ?></p>

    <a class="btn" href="edit_profile.php">Edit Profile</a>
    <a class="btn logout" href="logout.php">Logout</a>
</div>
</body>
</html>
