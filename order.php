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

// Get form data
$customer_name = $_POST['customer_name'];
$coffee_type = $_POST['coffee-type'];
$quantity = $_POST['quantity'];
$contact_info = $_POST['contact_info'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO orders (customer_name, coffee_type, quantity, contact_info) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $customer_name, $coffee_type, $quantity, $contact_info);

if ($stmt->execute()) {
    echo "Order placed successfully!<br>";
    echo "<a href='order.html'>Place another order</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
