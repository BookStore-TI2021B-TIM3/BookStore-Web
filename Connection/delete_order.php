<?php
include 'Connection/db_connect.php';

// Mengecek apakah parameter id telah diterima dari URL
if (isset($_GET['id'])) {
    $id_order = $_GET['id'];

    // Query untuk menghapus data order berdasarkan id
    $delete_query = "DELETE FROM orders WHERE id = '$id_order'";
    if ($conn->query($delete_query) === TRUE) {
        // Redirect ke halaman utama setelah berhasil menghapus
        header("Location: index.php?halaman=orders");
        exit();
    } else {
        echo "Error deleting order: " . $conn->error;
    }
} else {
    echo "ID order tidak ditemukan.";
}

$conn->close();
?>
