<?php
include "connection/db_connect.php"; 

// Query to fetch all orders
$result = $mysqli->query("SELECT * FROM orders");

$orders = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WEB BOOKSTORE">
    <meta name="author" content="">
    <title>Web BookStore</title>
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css" integrity="sha256-RXPAyxHVyMLxb0TYCM2OW5R4GWkcDe02jdYgyZp41OU=" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
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
        .content-container {
            margin-top: 80px; /* Adjusted to ensure enough space */
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, .05);
        }
        .btn-primary {
            background-color: #4466f2;
            border: none;
        }
        .btn-primary:hover {
            background-color: #3651a6;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top shadow">
            <div class="container">
                <span class="navbar-brand text-white">
                    <i class="fa-solid fa-laptop-code me-2"></i>
                    WEB BOOKSTORE TINFC 2021
                </span>
            </div>
        </nav>
    </header>

    <main class="container content-container">
        <div class="d-flex flex-column flex-lg-row mt-5 mb-4">
            <div class="flex-grow-1 d-flex align-items-center">
                <h3>Daftar Order</h3>
            </div>
            <div class="ms-5 ms-lg-0 pt-lg-2">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="menu.php" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
            <div class="alert alert-primary rounded-4 mb-5" role="alert">
                <i class="fa-solid fa-clipboard-list-check me-2"></i> Daftar Semua Order
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Status</th>
                        <th scope="col">Username</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kedatangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['title']; ?></td>
                            <td><?php echo $order['status']; ?></td>
                            <td><?php echo $order['username']; ?></td>
                            <td><?php echo $order['phone']; ?></td>
                            <td><?php echo $order['address']; ?></td>
                            <td><?php echo $order['date']; ?></td>
                            <td><?php echo $order['arrival']; ?></td>
                            <td>
                                <div class="d-flex">
                                    <!-- Tombol edit dengan onclick handler -->
                                    <a href="update_pembeli.php?id=<?php echo $order['id']; ?>" class="btn btn-outline-primary btn-sm rounded-4 me-2">
                                        <i class="fa-solid fa-pen-to-square me-1"></i>Edit
                                    </a>
                                    
                                    <!-- Tombol delete -->
                                    <form action="delete_order.php" method="POST">
                                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                        <button type="submit" name="delete_order" class="btn btn-outline-danger btn-sm rounded-4">
                                            <i class="fa-solid fa-trash-can me-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer mt-auto bg-white shadow py-4">
            <div class="container">
                <!-- Hak Cipta -->
                <div class="copyright text-center mb-2 mb-md-0">
                    &copy; 2024 - <a href="Uniku" target="_blank" class="text-brand text-decoration-none">from Universitas Kuningan</a>. All rights reserved.
                </div>
            </div>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-b3YzZAXz0SptVUbQJenLwe8ZKo5D4iv3JdIvOdCQzL2eg/Sk+uSsGWf+ksS5xI3B" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-CrXnt32noXU2U+8uFSUy8gImQIOEJgWe4VZtA7s7byhlJv5kV9fphB5hsXaPFXQ4" crossorigin="anonymous"></script>
</body>
</html>
