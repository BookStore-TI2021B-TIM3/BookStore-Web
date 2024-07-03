<?php
// Include file koneksi ke database (db_connect.php)
include 'db_connect.php';

// Tentukan header untuk respons JSON
header('Content-Type: application/json');

// Inisialisasi respons awal
$response = array('status' => 'error');

// Pastikan metode yang digunakan adalah DELETE
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Ambil ID pengguna dari query parameter
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);

        // Persiapkan statement SQL untuk menghapus pengguna berdasarkan ID
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param('i', $id);

        // Eksekusi statement SQL
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'User deleted successfully';
        } else {
            $response['message'] = 'Failed to delete user';
        }

        // Tutup statement
        $stmt->close();
    } else {
        $response['message'] = 'Invalid or missing ID';
    }
} else {
    $response['message'] = 'Invalid request method';
}

// Mengembalikan respons dalam bentuk JSON
echo json_encode($response);

// Tutup koneksi ke database
$conn->close();
?>
