<?php

session_start();

$allowed_attempts = 3;
$lockout_duration = 300; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; 

    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
    }

    if (isset($_SESSION['lockout_time']) && (time() < $_SESSION['lockout_time'])) {
        $remaining_time = ($_SESSION['lockout_time'] - time()) / 60;
        echo "<script>alert('You are locked out. Please try again in " . ceil($remaining_time) . " minutes or contact the Face-In team for further assistance.'); window.location.href='login.php';</script>";
        exit();
    }

    $xml = simplexml_load_file("users.xml") or die("Error: Cannot load users.xml file.");

    $authenticated = false;
    foreach ($xml->USER as $user) {
        if ($user->USERNAME == $username && $user->PASSWORD == $password && $user->TYPE == $role) {
            $authenticated = true;
            $_SESSION['username'] = (string)$user->USERNAME;
            $_SESSION['role'] = (string)$user->TYPE;
            $_SESSION['login_attempts'] = 0; 

            if ($user->TYPE == "admin") {
                header("Location: admin.php");
            } elseif ($user->TYPE == "group_coordinator") {
                header("Location: group_coordinator.php");
            } elseif ($user->TYPE == "lecturer") {
                header("Location: lecturer.php");
            } elseif ($user->TYPE == "student") {
                header("Location: student.php");
            }
            exit();
        }
    }

    if (!$authenticated) {
        $_SESSION['login_attempts']++;

        if ($_SESSION['login_attempts'] >= $allowed_attempts) {
            $_SESSION['lockout_time'] = time() + $lockout_duration;
            echo "<script>alert('Too many failed attempts. Please wait 5 minutes or contact the Face-In team for assistance.'); window.location.href='login.php';</script>";
        } else {
            $remaining_attempts = $allowed_attempts - $_SESSION['login_attempts'];
            echo "<script>alert('Invalid username, password, or role! You have " . $remaining_attempts . " attempts remaining.'); window.location.href='login.php';</script>";
        }
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Face-in</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background-color: #4CAF50;
            color: white;
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            background-color: #808080;
            padding: 20px;
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }
        input, select {
            width: 94%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn {
            background-color: white;
            color: black;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            width: 50%;
        }
        .btn:hover {
            background-color: #ddd;
        }
        .error {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h1>Welcome to Face-in</h1>
    <form method="POST" class="form-container">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="group_coordinator">Group Coordinator</option>
                <option value="lecturer">Lecturer</option>
                <option value="student">Student</option>
            </select>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
</div>
</body>
</html>
