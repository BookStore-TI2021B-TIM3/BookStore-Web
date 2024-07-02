<?php
include "connection/db_connect.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $arrival = $_POST['arrival'];

    // Query untuk mengupdate data order
    $query = $mysqli->query("UPDATE orders SET title='$title', status='$status', username='$username', phone='$phone', address='$address', date='$date', arrival='$arrival' WHERE id='$id'") 
        or die('Ada kesalahan pada query update data: ' . $mysqli->error);

    // Redirect ke halaman tampil_order.php setelah update berhasil
    header("Location: tampil_order.php");
}
?>
