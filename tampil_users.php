<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_bookstore";
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag yang diperlukan -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WEB BOOKSTORE">
    <meta name="author" content="">

    <!-- Judul -->
    <title>Web BookStore</title>

    <!-- Ikon Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css" integrity="sha256-RXPAyxHVyMLxb0TYCM2OW5R4GWkcDe02jdYgyZp41OU=" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- CSS Kustom -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #4466f2;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 10px;
        }

        .search-bar {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .search-bar input {
            width: 50%;
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        .search-bar button {
            background-color: #4466f2;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 20px;
        }

        .book-list {
            margin-top: 20px;
        }

        .book-item {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .book-item img {
            width: 50px;
            height: 70px;
            margin-right: 20px;
        }

        .book-info {
            flex-grow: 1;
        }

        .book-actions button {
            margin-left: 10px;
        }

        .add-book {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .add-book button {
            background-color: #4466f2;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
        }

        .content-wrapper {
            margin-top: 80px; /* Margin-top for spacing between header and content */
        }

        .footer-wrapper {
            margin-top: 40px; /* Margin-top for spacing between content and footer */
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <!-- Header -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top shadow">
            <div class="container">
                <span class="navbar-brand text-white">
                    <i class="fa-solid fa-laptop-code me-2"></i>
                    WEB BOOKSTORE TINFC 2021
                </span>
            </div>
        </nav>
    </header>

    <div class="content-wrapper">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row mt-5 mb-4">
                <div class="flex-grow-1 d-flex align-items-center">
                    <h3>Users</h3>
                </div>
                <div class="ms-5 ms-lg-0 pt-lg-2">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="menu.php" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Pagination
                        $batas = 10;
                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                        $previous = $halaman - 1;
                        $next = $halaman + 1;

                        $data = $conn->query("SELECT * FROM users");
                        $jumlah_data = $data->num_rows;
                        $total_halaman = ceil($jumlah_data / $batas);

                        $query = $conn->query("SELECT * FROM users LIMIT $halaman_awal, $batas");

                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['username']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['location']}</td>
                                        <td>{$row['phone']}</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No users found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if($halaman == 1) echo 'disabled'; ?>">
                        <a class="page-link" <?php if($halaman > 1) { echo "href='?halaman=$previous'"; } ?>>Previous</a>
                    </li>
                    <?php
                    for($x=1; $x<=$total_halaman; $x++) {
                        echo "<li class='page-item'><a class='page-link' href='?halaman=$x'>$x</a></li>";
                    }
                    ?>
                    <li class="page-item <?php if($halaman == $total_halaman) echo 'disabled'; ?>">
                        <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="footer-wrapper">
        <!-- Footer -->
        <footer class="footer mt-auto bg-white shadow py-4">
            <div class="container">
                <!-- Hak Cipta -->
                <div class="copyright text-center mb-2 mb-md-0">
                    &copy; 2024 - <a href="Uniku" target="_blank" class="text-brand text-decoration-none">from Universitas Kuningan</a>. All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js" integrity="sha256-AkQap91tDcS4YyQaZY2VV34UhSCxu2bDEIgXXXuf5Hg=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/l10n/id.js" integrity="sha256-cvHCpHmt9EqKfsBeDHOujIlR5wZ8Wy3s90da1L3sGkc=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
