<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag yang diperlukan -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WEB BOOKSTORE">
    <meta name="author" content="">

    <!-- Judul -->
    <title>Dashboard - Web BookStore</title>

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
            margin-bottom: 20px; /* Margin-bottom for spacing below navbar */
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 10px;
        }

        .content-wrapper {
            margin-top: 80px; /* Margin-top for spacing between header and content */
            margin-bottom: 20px; /* Margin-bottom for spacing below content */
        }

        .footer-wrapper {
            margin-top: 20px; /* Margin-top for spacing above footer */
            margin-bottom: 20px; /* Margin-bottom for spacing below footer */
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-icon {
            font-size: 2rem;
            color: #4466f2;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 500;
            margin-top: 10px;
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

    <!-- Main content -->
    <main class="content-wrapper container mt-5">
        <div class="row">
            <!-- Kelola Buku Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-book card-icon"></i>
                        <h5 class="card-title">Kelola Buku</h5>
                        <a href="buku.php" class="btn btn-primary">Lihat Buku</a>
                    </div>
                </div>
            </div>

            <!-- Kelola Penjualan Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-dollar-sign card-icon"></i>
                        <h5 class="card-title">Kelola Penjualan</h5>
                        <a href="tampil_order.php" class="btn btn-primary">Lihat Penjualan</a>
                    </div>
                </div>
            </div>

            <!-- Kelola Pengguna Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-users card-icon"></i>
                        <h5 class="card-title">Kelola Pengguna</h5>
                        <a href="tampil_users.php" class="btn btn-primary">Lihat Pengguna</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
