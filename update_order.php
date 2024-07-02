<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $status = $_POST['status_update'];
    $arrival = $_POST['arrival_update'];

    // Convert arrival date to YYYY-MM-DD format for MySQL
    $arrival_date = DateTime::createFromFormat('d-m-Y', $arrival)->format('Y-m-d');

    // Database connection
    $mysqli = new mysqli("localhost", "username", "password", "database_name");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Update query
    $query = "UPDATE orders SET status=?, arrival=? WHERE id=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssi", $status, $arrival_date, $order_id);

    // Execute the query
    if ($stmt->execute()) {
        echo "Order status updated successfully.";
    } else {
        echo "Error updating record: " . $mysqli->error;
    }

    // Close connection
    $stmt->close();
    $mysqli->close();
}
?>
