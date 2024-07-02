<?php
include "connection/db_connect.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id_order = $_POST['id'];
    $title = $_POST['title'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $arrival = $_POST['arrival']; 

    // Update query
    $query = "UPDATE orders SET
              title='$title', 
              status='$status', 
              username='$username', 
              phone='$phone', 
              address='$address', 
              date='$date', 
              arrival='$arrival'
              WHERE id='$id_order'";

    if ($mysqli->query($query) === TRUE) {
        // Redirect to a success page or back to the form page
        header("Location: tampil_order.php");
        exit();
    } else {
        echo "Error updating order: " . $mysqli->error;
    }
}

// Close database connection
$mysqli->close();
?>
