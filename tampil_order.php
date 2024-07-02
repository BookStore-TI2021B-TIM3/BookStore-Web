<?php
// Include database connection
include 'Connection/db_connect.php';

// Update status order if form is submitted
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

// Insert new order if form is submitted
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

// Delete order if form is submitted
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

// Fetch data from the orders table
$query = $conn->query("SELECT * FROM orders ORDER BY id DESC");

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
                    <i class="fa-regular fa-orders icon-title"></i>
                    <h3>Orders</h3>
                </div>
                <div class="ms-5 ms-lg-0 pt-lg-2">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>

    <!-- Content -->
    <div class="container mt-4 content-wrapper">
        <div class="table-responsive shadow p-3 mt-4 mb-5 rounded-4 border-0 bg-white">
            <table class="table table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">ID</th>
                        <th class="border-0">Title</th>
                        <th class="border-0">Username</th>
                        <th class="border-0">Phone</th>
                        <th class="border-0">Price</th>
                        <th class="border-0">Date</th>
                        <th class="border-0">Address</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Arrival</th>
                        <th class="border-0">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $query->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['arrival']; ?></td>
                            <td>
                                <div class="d-flex">
                                    <form action="update_pembeli.php" method="POST">
                                        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                         <button type="submit" name="edit_order" class="btn btn-outline-primary btn-sm rounded-4 me-2">
                                          <i class="fa-solid fa-pen-to-square me-1"></i>Edit
                                         </button>
                                        </form>

                                    <form action="" method="POST">
                                        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_order" class="btn btn-outline-danger btn-sm rounded-4">
                                            <i class="fa-solid fa-trash-can me-1"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
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

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqeqfXM98Lx16L2vnM5Q5vYtnwHl8LLDiubz3aAhU78Y08TStSLBf4aYZiQ==" crossorigin="anonymous"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js" integrity="sha256-I6S9R76yt7vF2wwyML7ShlNh2gCkMnLKk9gy8/a48Lg=" crossorigin="anonymous"></script>
    <script>
        flatpickr("input[type=date]", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
</body>
</html>
