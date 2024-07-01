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

// Update status order jika form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $sql = "UPDATE orders SET status='$status' WHERE id='$order_id'";
    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>Sukses!</strong> Status order berhasil diperbarui.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-exclamation me-2"></i>Error!</strong> Terjadi kesalahan saat memperbarui status: ' . $conn->error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}

// Insert data order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_order'])) {
    $title = $_POST['title'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $arrival = $_POST['arrival'];

    $sql = "INSERT INTO orders (title, username, phone, price, date, address, status, arrival) VALUES ('$title', '$username', '$phone', '$price', '$date', '$address', '$status', '$arrival')";
    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>Sukses!</strong> Order berhasil disimpan.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-exclamation me-2"></i>Error!</strong> Terjadi kesalahan saat menyimpan order: ' . $conn->error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}

// Delete data order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_order'])) {
    $order_id = $_POST['order_id'];

    $sql = "DELETE FROM orders WHERE id='$order_id'";
    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>Sukses!</strong> Order berhasil dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-exclamation me-2"></i>Error!</strong> Terjadi kesalahan saat menghapus order: ' . $conn->error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
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
    <!-- Konten -->
    <div class="container mt-4 content-wrapper">
        <div class="table-responsive shadow p-3 mt-4 mb-5 rounded-4 border-0 bg-white">
            <table class="table table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Judul Buku</th>
                        <th>Nama Pembeli</th>
                        <th>No. Telp</th>
                        <th>Harga</th>
                        <th>Tanggal Order</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Estimasi Tiba</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM orders";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['arrival'] . "</td>";
                            echo "<td>
                                    <button type='button' class='btn btn-primary btn-sm me-2' data-bs-toggle='modal' data-bs-target='#updateOrderModal" . $row['id'] . "'><i class='fa-solid fa-pencil me-2'></i>Edit</button>
                                    <button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteOrderModal" . $row['id'] . "'><i class='fa-solid fa-trash me-2'></i>Hapus</button>
                                  </td>";
                            echo "</tr>";
                            ?>
                            <!-- Modal Update Order -->
                            <div class="modal fade" id="updateOrderModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="updateOrderModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateOrderModalLabel<?php echo $row['id']; ?>">Update Order</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" id="status" name="status">
                                                        <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                                        <option value="Dikirim" <?php echo ($row['status'] == 'Dikirim') ? 'selected' : ''; ?>>Dikirim</option>
                                                        <option value="Selesai" <?php echo ($row['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="update_status" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Delete Order -->
                            <div class="modal fade" id="deleteOrderModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteOrderModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteOrderModalLabel<?php echo $row['id']; ?>">Hapus Order</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                                <p>Apakah Anda yakin ingin menghapus order ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="delete_order" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>Tidak ada data order.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzOgBH3jqChS2Em7lO4he4l5Yy9E2gQ8Y5B1QWO8/Enj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93qGtdPme6B/s+r3wDd5yMa5eMo0D1hENt8KjpFf6m9g3mrK6cw5NRJ24eG5eG" crossorigin="anonymous"></script>
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js" integrity="sha256-iTnRwBUJ6+MAlfkaLFMlJm3ZjNCDK4M8NSpF+cLBInI=" crossorigin="anonymous"></script>
    <script>
        // Inisialisasi Flatpickr untuk input tanggal
        flatpickr(".datepicker", {
            dateFormat: "Y-m-d"
        });
    </script>
</body>
</html>
