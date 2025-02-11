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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 600px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h3 {
            margin-bottom: 10px;
            width: 100%;
            text-align: left;
        }
        .dropdown {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .next-button {
            background: green;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
        }
        .next-button:hover {
            background: darkgreen;
        }
    </style>
</head>
<body>

    <div class="container">
        <h3>Select Year</h3>
        <select class="dropdown" id="year">
            <option value="2023">2023</option>
            <option value="2024">2024</option>
        </select>

        <h3>Select Semester</h3>
        <select class="dropdown" id="semester">
            <option value="semester2">Semester 2</option>
            <option value="semester3">Semester 3</option>
        </select>

        <h3>Module</h3>
        <select class="dropdown" id="module">
            <option value="itpm">IT Project Management</option>
            <option value="programming">Programming</option>
        </select>

        <button class="next-button">Next</button>
    </div>
    
</body>
</html>
