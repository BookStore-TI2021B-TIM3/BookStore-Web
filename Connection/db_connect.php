<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
$host = 'localhost';
$db = 'db_bookstore';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Koneksi gagal: ' . $mysqli->connect_error);
}
?>