<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $arrival = $_POST['arrival'];

    // Convert arrival date to YYYY-MM-DD format for MySQL
    $arrival_date = DateTime::createFromFormat('d-m-Y', $arrival)->format('Y-m-d');

    // Database connection
    $mysqli = new mysqli("localhost", "username", "password", "database_name");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Insert query
    $query = "INSERT INTO orders (title, username, phone, price, date, address, status, arrival)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssssssss", $title, $username, $phone, $price, $date, $address, $status, $arrival_date);

    // Execute the query
    if ($stmt->execute()) {
        echo "Order added successfully.";
    } else {
        echo "Error adding record: " . $mysqli->error;
    }

    // Close connection
    $stmt->close();
    $mysqli->close();
}
?>
