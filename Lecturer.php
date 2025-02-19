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
<head>
    <title>Face-in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleDropdown(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function selectOption(buttonId, option) {
            document.getElementById(buttonId).innerText = option;
            toggleDropdown(buttonId + 'Dropdown');
        }
    </script>
</head>
<body class="m-0 p-0 font-sans">
    <div class="bg-gray-600 text-green-900 text-2xl p-2">Face-in</div>
    <div class="flex h-screen">
        <div class="flex-1 bg-gray-300 flex flex-col justify-center items-center p-4 relative">
            <div class="flex space-x-4">
                <div class="relative">
                    <button id="yearButton" onclick="toggleDropdown('yearDropdown')" class="bg-gray-200 text-black text-lg sm:text-xl md:text-2xl lg:text-3xl py-3 px-6 m-2 rounded-full">SELECT YEAR</button>
                    <div id="yearDropdown" class="absolute bg-white shadow-lg rounded-lg mt-2 hidden">
                        <ul>
                            <li class="px-4 py-2 hover:bg-gray-200 cursor-pointer" onclick="selectOption('yearButton', '2023')">2023</li>
                            <li class="px-4 py-2 hover:bg-gray-200 cursor-pointer" onclick="selectOption('yearButton', '2024')">2024</li>
                            <li class="px-4 py-2 hover:bg-gray-200 cursor-pointer" onclick="selectOption('yearButton', '2025')">2025</li>
                        </ul>
                    </div>
                </div>
                <div class="relative">
                    <button id="semesterButton" onclick="toggleDropdown('semesterDropdown')" class="bg-gray-200 text-black text-lg sm:text-xl md:text-2xl lg:text-3xl py-3 px-6 m-2 rounded-full">SELECT SEMESTER</button>
                    <div id="semesterDropdown" class="absolute bg-white shadow-lg rounded-lg mt-2 hidden">
                        <ul>
                            <li class="px-4 py-2 hover:bg-gray-200 cursor-pointer" onclick="selectOption('semesterButton', 'Semester 1')">Semester 1</li>
                            <li class="px-4 py-2 hover:bg-gray-200 cursor-pointer" onclick="selectOption('semesterButton', 'Semester 2')">Semester 2</li>
                            <li class="px-4 py-2 hover:bg-gray-200 cursor-pointer" onclick="selectOption('semesterButton', 'Semester 3')">Semester 3</li>
                            <li class="px-4 py-2 hover:bg-gray-200 cursor-pointer" onclick="selectOption('semesterButton', 'Semester 4')">Semester 4</li>
                        </ul>
                    </div>
                </div>
            </div>
            <button class="bg-gray-200 text-black text-sm sm:text-base md:text-lg lg:text-xl py-2 px-4 m-2 rounded-full absolute bottom-4 right-4">NEXT</button>
        </div>
        <div class="w-20 bg-green-900 flex flex-col items-center justify-between p-4">
            <div class="bg-white w-12 h-12 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-user text-green-900 text-2xl"></i>
            </div>
            <button class="bg-gray-200 text-black text-sm sm:text-base md:text-lg lg:text-xl py-2 px-4 rounded-full">LOG OUT</button>
        </div>
    </div>
</body>
</html>
