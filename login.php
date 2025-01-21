<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "coffee_shop_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get login details from the form
$user = $_POST['username'];
$pass = $_POST['password'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($hashed_password);
$stmt->fetch();

if (password_verify($pass, $hashed_password)) {
    echo "Welcome, " . htmlspecialchars($user) . "!";
} else {
    echo "Invalid username or password.";
}

$stmt->close();
$conn->close();
?>
