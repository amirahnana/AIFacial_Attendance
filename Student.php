<html>
<head>
    <title>Face-in</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #7D7D7D;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 20%;
            background-color: #F0F0F0;
            padding: 20px;
            box-sizing: border-box;
        }
        .main-content {
            width: 75%;
            background-color: #E0E0E0;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .header {
            background-color: #004d00;
            color: #00cc00;
            padding: 10px;
            text-align: left;
            font-size: 24px;
        }
        .attendance-status {
            color: #B22222;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .attendance-percentage {
            font-size: 48px;
            color: #008000;
            margin: 20px 0;
        }
        .user-info {
            background-color: #D3D3D3;
            padding: 10px;
            border-radius: 10px;
            font-size: 14px;
        }
        .dropdown {
            background-color: #D3D3D3;
            padding: 10px;
            border-radius: 10px;
            margin: 10px 0;
            width: 80%;
            text-align: left;
            font-size: 16px;
        }
        .dropdown select {
            width: 100%;
            padding: 10px;
            border: none;
            background: none;
            font-size: 16px;
        }
        .next-button {
            background-color: #D3D3D3;
            padding: 10px 20px;
            border-radius: 10px;
            margin-top: 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .profile-section {
            background-color: #004d00;
            width: 5%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            position: relative;
        }
        .profile-section img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-bottom: 20px;
        }
        .logout-button {
            background-color: #D3D3D3;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            position: absolute;
            bottom: 20px;
            width: calc(100% - 40px);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        Face-in
    </div>
    <div class="container">
        <div class="sidebar">
            <div class="attendance-status">
                ATTENDANCE STATUS:
            </div>
            <div class="attendance-percentage">
                90%
            </div>
            <div class="user-info">
                AWIE AMY
                <br/>
                23FTT1000
                <br/>
                DCNG001
                <br/>
                SCHOOL OF INFORMATION AND TECHNOLOGY
            </div>
        </div>
        <div class="main-content">
            <div class="dropdown">
                <select>
                    <option>SELECT YEAR</option>
                </select>
            </div>
            <div class="dropdown">
                <select>
                    <option>SELECT SEMESTER</option>
                </select>
            </div>
            <div class="dropdown">
                <select>
                    <option>SELECT MODULE</option>
                </select>
            </div>
            <div class="next-button">
                NEXT
            </div>
        </div>
        <div class="profile-section">
            <img src="https://placehold.co/50x50" alt="Profile picture"/>
            <div class="logout-button">
                LOG OUT
            </div>
        </div>
    </div>
</body>
</html>
