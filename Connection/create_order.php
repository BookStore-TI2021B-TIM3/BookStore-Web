<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? '';
    $price = $_POST['price'] ?? '';
    $status = $_POST['status'] ?? '';
    $username = $_POST['username'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $date = $_POST['date'] ?? '';

    // Validate if all fields are provided
    if (empty($title) || empty($price) || empty($username) || empty($phone) || empty($address) || empty($date)) {
        echo "All fields are required.";
        exit;
    }

    // Convert date format from dd-MM-yyyy to yyyy-MM-dd for MySQL
    $formattedDate = date('Y-m-d', strtotime(str_replace('-', '/', $date)));

    // Prepare and bind parameters for insertion
    $stmt = $conn->prepare("INSERT INTO orders (title, price, status, username, phone, address, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sssssss", $title, $price, $status, $username, $phone, $address, $formattedDate);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
