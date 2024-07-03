<?php
include "connection/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_order'])) {
    $order_id = $_POST['order_id'];

    // Query untuk menghapus order berdasarkan id
    $delete_query = "DELETE FROM orders WHERE id=?";
    $stmt = $mysqli->prepare($delete_query);
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        header("Location: tampil_order.php");
        exit();
    } else {
        echo "Error deleting order: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>
