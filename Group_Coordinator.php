<?php
session_start();
if ($_SESSION['role'] !== 'group_coordinator') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Group Coordinator Dashboard</title>
</head>
<body>
    <h1>Welcome, Group Coordinator!</h1>
    <p>Group coordination functionalities here.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
