<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_shop_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get registration details from the form
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];

// Hash the password
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Check if username already exists
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Username already taken. Please choose another one.";
} else {
    // Insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $hashed_password, $email);

    if ($stmt->execute()) {
        echo "Registration successful. You can now <a href='login.html'>login</a>.";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>
