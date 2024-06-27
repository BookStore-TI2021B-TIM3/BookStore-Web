<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database, gantilah dengan informasi koneksi sesuai dengan database Anda
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_bookstore";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data yang dikirimkan melalui form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah user ada di database
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User ditemukan, set session dan redirect ke halaman selanjutnya
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        // Jika user tidak ditemukan, tampilkan pesan error
        echo "Username atau password salah";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
</head>
<body>

<h2>Form Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>
