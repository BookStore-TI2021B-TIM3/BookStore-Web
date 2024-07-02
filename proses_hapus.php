<?php
// Panggil file "db_connect.php" untuk koneksi ke database
require_once "connection/db_connect.php";

// Mengecek data GET "id"
if (isset($_GET['id'])) {
    // Ambil data GET dari tombol hapus
    $id_buku = $mysqli->real_escape_string(trim($_GET['id']));

    // Mengecek data gambar buku
    // SQL statement untuk menampilkan data "imageUrl" dari tabel "books" berdasarkan "id"
    $query = $mysqli->query("SELECT imageUrl FROM books WHERE id='$id_buku'")
        or die('Ada kesalahan pada query tampil data: ' . $mysqli->error);
    // Ambil data hasil query
    $data = $query->fetch_assoc();

    // Hapus file gambar dari folder images
    if (isset($data['imageUrl']) && !empty($data['imageUrl'])) {
        $hapus_file = unlink("images/" . $data['imageUrl']);
    }

    // SQL statement untuk delete data dari tabel "books" berdasarkan "id"
    $delete = $mysqli->query("DELETE FROM books WHERE id='$id_buku'")
        or die('Ada kesalahan pada query delete: ' . $mysqli->error);

    // Cek query
    // Jika proses delete berhasil
    if ($delete) {
        // Alihkan ke halaman index dan tampilkan pesan berhasil hapus data
        header('location: buku.php?pesan=3');
    }
}
?>
