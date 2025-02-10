<?php
session_start();
if ($_SESSION['role'] !== 'lecturer') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lecturer Dashboard</title>
</head>
<body>
    <h1>Welcome, Lecturer!</h1>
    <p>Lecturer functionalities here.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
