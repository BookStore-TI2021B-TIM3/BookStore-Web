<!-- <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> -->

<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_bookstore';

// Membuat koneksi ke database
$mysqli = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi gagal: ' . $mysqli->connect_error);
}
?>
