<?php
// panggil file "db_connect.php" untuk koneksi ke database
require_once "connection/db_connect.php";

// mengecek data hasil submit dari form
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $author      = $mysqli->real_escape_string($_POST['author']);
    $title       = $mysqli->real_escape_string($_POST['title']);
    $price       = $mysqli->real_escape_string($_POST['price']);
    $rating      = $mysqli->real_escape_string($_POST['rating']);
    $synopsis    = $mysqli->real_escape_string($_POST['synopsis']);

    // ambil data file hasil submit dari form
    if (isset($_FILES['imageUrl']) && $_FILES['imageUrl']['error'] == UPLOAD_ERR_OK) {
        $nama_file          = $_FILES['imageUrl']['name'];
        $tmp_file           = $_FILES['imageUrl']['tmp_name'];
        $extension          = pathinfo($nama_file, PATHINFO_EXTENSION);
        // enkripsi nama file
        $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
        // tentukan direktori penyimpanan file
        $path               = "assets/img/" . $nama_file_enkripsi;

        // lakukan proses unggah file
        // jika file berhasil diunggah
        if (move_uploaded_file($tmp_file, $path)) {
            // sql statement untuk insert data ke tabel "books"
            $insert = $mysqli->query("INSERT INTO books (author, title, price, rating, synopsis, imageUrl) 
                                      VALUES ('$author', '$title', '$price', '$rating', '$synopsis', '$nama_file_enkripsi')")
                                      or die('Ada kesalahan pada query insert: ' . $mysqli->error);
            // cek query
            // jika proses insert berhasil
            if ($insert) {
                // alihkan ke halaman data buku dan tampilkan pesan berhasil simpan data
                header('Location: buku.php?halaman=data&pesan=1');
            }
        } else {
            die('Gagal mengunggah file.');
        }
    } else {
        die('Tidak ada file yang diunggah atau terjadi kesalahan pada unggahan.');
    }
}
?>
