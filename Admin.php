<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$students = [
    ["id" => "01", "name" => "Student 1", "email" => "student1@example.com", "attendance" => 80],
    ["id" => "02", "name" => "Student 2", "email" => "student2@example.com", "attendance" => 75],
    ["id" => "03", "name" => "Student 3", "email" => "student3@example.com", "attendance" => 60],
    ["id" => "04", "name" => "Student 4", "email" => "student4@example.com", "attendance" => 10],
    ["id" => "05", "name" => "Student 5", "email" => "student5@example.com", "attendance" => 95],
];

function getStatusColor($attendance) {
    if ($attendance >= 80) return "green";
    if ($attendance >= 50) return "yellow";
    return "red";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0; }
        .container { width: 80%; margin: auto; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #2a5d84; }
        .header { display: flex; justify-content: space-between; align-items: center; background: #2a5d84; padding: 10px; color: white; }
        .logout { background: #dc3545; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        th { background: #2a5d84; color: white; }
        .status { width: 20px; height: 20px; border-radius: 50%; display: inline-block; }
        .green { background: green; }
        .yellow { background: yellow; }
        .red { background: red; }
        .buttons { margin-top: 20px; display: flex; justify-content: space-between; }
        .btn { padding: 10px 15px; background: #2a5d84; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .btn:hover { background: #1d435d; }
        .filter-section { margin-bottom: 20px; }
        select, .search-btn { padding: 10px; margin-right: 10px; }
    </style>
</head>
<body>

    <div class="header">
        <h2>Face-in | Admin Dashboard</h2>
        <a href="logout.php" class="logout">LOG OUT</a>
    </div>

    <div class="container">
        <h1>Student Attendance Report</h1>
        
        <div class="filter-section">
            <select id="school">
                <option value="">Select School</option>
                <option value="SICT">SICT</option>
                <option value="SHS">SHS</option>
                <option value="SBS">SBS</option>
                <option value="SPC">SPC</option>
                <option value="SSE">SSE</option>
            </select>
            <select id="year">
                <option value="">Select Year</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
            <select id="groupCode">
                <option value="">Select Group Code</option>
                <option value="DWTY01">DWTY01</option>
                <option value="DDAT02">DDAT02</option>
                <option value="DCNG01">DCNG01</option>
            </select>
            <select id="semester">
                <option value="">Select Semester</option>
                <option value="Semester 1">Semester 1</option>
                <option value="Semester 2">Semester 2</option>
                <option value="Semester 3">Semester 3</option>
                <option value="Semester 4">Semester 4</option>
                <option value="Semester 5">Semester 5</option>
                <option value="Semester 6">Semester 6</option>
            </select>
            <select id="lecturer">
                <option value="">Select Module Lecturer</option>
                <option value="JamiatulZuhairah">JamiatulZuhairah</option>
                <option value="HjhSaudah">HjhSaudah</option>
            </select>
            <button class="search-btn btn">Search</button>
        </div>

        <table>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Attendance %</th>
                <th>Status</th>
            </tr>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?= $student["id"]; ?></td>
                    <td><?= $student["name"]; ?></td>
                    <td><?= $student["email"]; ?></td>
                    <td><?= $student["attendance"]; ?></td>
                    <td><span class="status <?= getStatusColor($student["attendance"]); ?>"></span></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="buttons">
            <button class="btn" onclick="window.print()">Print</button>
            <button class="btn" onclick="window.history.back()">Back</button>
            <a href="add_student.php" class="btn">Add New Student</a>
        </div>
    </div>

</body>
</html>
