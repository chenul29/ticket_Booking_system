<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: userlogin.php");
    exit();
}

$full_name = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ticket Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .navbar h1 {
            font-size: 24px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid white;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s;
        }
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .welcome-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .welcome-card h2 {
            color: #333;
            margin-bottom: 10px;
        }
        .welcome-card p {
            color: #666;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .dashboard-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .dashboard-card h3 {
            color: #667eea;
            margin-bottom: 10px;
        }
        .dashboard-card p {
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>Ticket Management System</h1>
        <div class="user-info">
            <span>Welcome, <?php echo htmlspecialchars($full_name); ?>!</span>
            <a href="../Backend/logout.php" class="logout-btn">Logout</a>
        </div>
    </nav>
    
    <div class="container">
        <div class="welcome-card">
            <h2>Welcome to Your Dashboard</h2>
            <p>You have successfully logged in to the Ticket Management System.</p>
        </div>
        
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>Book Tickets</h3>
                <p>Browse and book tickets for upcoming events</p>
            </div>
            <div class="dashboard-card">
                <h3>My Bookings</h3>
                <p>View and manage your ticket bookings</p>
            </div>
            <div class="dashboard-card">
                <h3>Profile</h3>
                <p>Update your account information</p>
            </div>
            <div class="dashboard-card">
                <h3>Support</h3>
                <p>Get help and contact support</p>
            </div>
        </div>
    </div>
</body>
</html>
