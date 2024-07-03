<?php
include "connection/db_connect.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $arrival = filter_input(INPUT_POST, 'arrival', FILTER_SANITIZE_STRING);

    // Prepare and bind parameters for the update query
    $query = $mysqli->prepare("UPDATE orders SET title=?, status=?, username=?, phone=?, address=?, date=?, arrival=? WHERE id=?");
    $query->bind_param("sssssssi", $title, $status, $username, $phone, $address, $date, $arrival, $id);

    if ($query->execute()) {
        // Redirect to the orders page after successful update
        header("Location: tampil_order.php");
        exit();
    } else {
        // Handle error
        echo "Error updating order: " . $query->error;
    }

    $query->close();
}

$mysqli->close();
?>
