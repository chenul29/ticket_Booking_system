<?php
session_start();
require_once 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Validate input
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and password are required";
        header("Location: ../frontend/userlogin.php");
        exit();
    }
    
    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password, email, full_name FROM client WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password (assuming passwords are hashed with password_hash())
        if (password_verify($password, $user['password'])) {
            // Password is correct, create session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['logged_in'] = true;
            
            // Redirect to dashboard or home page
            header("Location: ../frontend/dashboard.php");
            exit();
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid username or password";
            header("Location: ../frontend/userlogin.php");
            exit();
        }
    } else {
        // User not found
        $_SESSION['error'] = "Invalid username or password";
        header("Location: ../frontend/userlogin.php");
        exit();
    }
    
    $stmt->close();
    $conn->close();
} else {
    // If not POST request, redirect to login page
    header("Location: ../frontend/userlogin.php");
    exit();
}
?>
