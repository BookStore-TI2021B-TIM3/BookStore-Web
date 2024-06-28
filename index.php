<?php
// panggil file "db_connect.php" untuk koneksi ke database
require_once "connection/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

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

    <!-- Main Content -->
    <main class="flex-shrink-0">
        <div class="container pt-5">
            <?php
            // pemanggilan file konten sesuai "halaman" yang dipilih
            // jika tidak ada halaman yang dipilih atau halaman yang dipilih "data"
            if (empty($_GET["halaman"]) || $_GET['halaman'] == 'data') {
                // panggil file tampil data
                include "tampil_data.php";
            }
            // jika halaman yang dipilih "entri"
            elseif ($_GET['halaman'] == 'entri') {
                // panggil file form entri
                include "form_entri.php";
            }
            // jika halaman yang dipilih "ubah"
            elseif ($_GET['halaman'] == 'ubah') {
                // panggil file form ubah
                include "form_ubah.php";
            }
            // jika halaman yang dipilih "detail"
            elseif ($_GET['halaman'] == 'detail') {
                // panggil file tampil detail
                include "tampil_detail.php";
            }
            // jika halaman yang dipilih "pencarian"
            elseif ($_GET['halaman'] == 'pencarian') {
                // panggil file tampil pencarian
                include "tampil_pencarian.php";
            }
            ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto bg-white shadow py-4">
        <div class="container">
            <!-- Hak Cipta -->
            <div class="copyright text-center mb-2 mb-md-0">
                &copy; 2024 - <a href="Uniku" target="_blank" class="text-brand text-decoration-none">from Universitas Kuningan</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js" integrity="sha256-AkQap91tDcS4YyQaZY2VV34UhSCxu2bDEIgXXXuf5Hg=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/l10n/id.js" integrity="sha256-cvHCpHmt9EqKfsBeDHOujIlR5wZ8Wy3s90da1L3sGkc=" crossorigin="anonymous"></script>

    <!-- Skrip Kustom -->
    <script src="assets/js/flatpickr.js"></script>
    <script src="assets/js/form-validation.js"></script>
    <script>
        function confirmDelete(id, title) {
            if (confirm(`Are you sure you want to delete '${title}'?`)) {
                window.location.href = `delete.php?id=${id}`;
            }
        }
    </script>
</body>

</html>
