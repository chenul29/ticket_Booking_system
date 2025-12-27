<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "ticketBooking";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8mb4 for proper character support
$conn->set_charset("utf8mb4");

// Optional: Uncomment to see success message
// echo "Connected successfully to ticketBooking database";
?>
