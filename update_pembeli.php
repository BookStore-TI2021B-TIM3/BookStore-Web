<?php
include "connection/db_connect.php";

$id = $_GET['id'];

// Query untuk mengambil data order berdasarkan id
$result = $mysqli->query("SELECT * FROM orders WHERE id='$id'");
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data order tidak ditemukan.";
    exit;
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
            margin-top: 100px; /* Adjusted to ensure enough space */
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
        .breadcrumb {
            justify-content: flex-end; /* Align breadcrumb to the right */
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
        <h2>Edit Order</h2>
        <form action="proses_update_order.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="d-flex flex-column flex-lg-row mb-4">
                <div class="flex-grow-1 d-flex align-items-center">
                    <!-- Empty div to align breadcrumb to the right -->
                </div>
                <div class="ms-5 ms-lg-0 pt-lg-2">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="menu.php" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="tampil_order.php" class="text-dark text-decoration-none">Orders</i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="title" placeholder="Masukkan judul" name="title" value="<?php echo $data['title']; ?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="on_process" value="pending" <?php echo ($data['status'] == 'On process') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="pending">Pending</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="on_process" value="diproses" <?php echo ($data['status'] == 'On process') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="on_process">Diproses</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="no_process" value="dikirim" <?php echo ($data['status'] == 'No process') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="dikirim">Dikirim</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="no_process" value="terkirim" <?php echo ($data['status'] == 'No process') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="terkirim">Terkirim</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username" value="<?php echo $data['username']; ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telepon:</label>
                <input type="text" class="form-control" id="phone" placeholder="Masukkan nomor telepon" name="phone" value="<?php echo $data['phone']; ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="address" placeholder="Masukkan alamat" name="address" value="<?php echo $data['address']; ?>">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal:</label>
                <input type="date" class="form-control" id="date" placeholder="Masukkan tanggal" name="date" value="<?php echo $data['date']; ?>">
            </div>
            <div class="mb-3">
                <label for="arrival" class="form-label">Kedatangan:</label>
                <input type="date" class="form-control" id="arrival" placeholder="Masukkan kedatangan" name="arrival" value="<?php echo $data['arrival']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="tampil_order.php" class="btn btn-secondary ms-2">Batal</a>
        </form>
    </main>

    <footer class="bg-white text-center p-4 mt-5 shadow">
        &copy; 2024 WEB BOOKSTORE TINFC 2021
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-b3YzZAXz0SptVUbQJenLwe8ZKo5D4iv3JdIvOdCQzL2eg/Sk+uSsGWf+ksS5xI3B" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-CrXnt32noXU2U+8uFSUy8gImQIOEJgWe4VZtA7s7byhlJv5kV9fphB5hsXaPFXQ4" crossorigin="anonymous"></script>
</body>
</html>
