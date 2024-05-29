<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$user_input_username = $_POST['username'];
$user_input_password = $_POST['password'];

$stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $user_input_username, $user_input_password);

if ($stmt->execute()) {
    return true;
} else {
    return false;
}

$stmt->close();


$conn->close();
?>
