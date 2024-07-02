<?php
include "connection/db_connect.php"; 

// Mengecek data GET "id"
if (isset($_GET['id'])) {
    $id_order = $_GET['id'];

    // Query untuk mengambil data order berdasarkan id
    $query = $mysqli->query("SELECT * FROM orders WHERE id='$id_order'") 
        or die('Ada kesalahan pada query tampil data: ' . $mysqli->error);

    $data = $query->fetch_assoc();
}
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
            margin-top: 70px;
        }
        .form-title {
            color: #4466f2;
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

    <main class="container">
        <div class="d-flex flex-column flex-lg-row mt-5 mb-4">
            <div class="flex-grow-1 d-flex align-items-center">
                <h3>Ubah Order</h3>
            </div>
            <div class="ms-5 ms-lg-0 pt-lg-2">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item"><a href="index.php" class="text-dark text-decoration-none">Orders</a></li>
                        <li class="breadcrumb-item" aria-current="page">Ubah</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
            <div class="alert alert-primary rounded-4 mb-5" role="alert">
                <i class="fa-solid fa-pen-to-square me-2"></i> Ubah Data Order
            </div>
            <form action="proses_update_order.php" method="post">
                <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                
                <div class="mb-3">
                    <label for="title" class="form-label">Judul:</label>
                    <input type="text" class="form-control" id="title" placeholder="Masukkan judul" name="title" value="<?php echo isset($data['title']) ? $data['title'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="on_process" value="On process" <?php echo (isset($data['status']) && $data['status'] == 'On process') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="on_process">On process</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="no_process" value="No process" <?php echo (isset($data['status']) && $data['status'] == 'No process') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="no_process">No process</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username" value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telepon:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Masukkan nomor telepon" name="phone" value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat:</label>
                    <input type="text" class="form-control" id="address" placeholder="Masukkan alamat" name="address" value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal:</label>
                    <input type="text" class="form-control datepicker" id="date" placeholder="Masukkan tanggal" name="date" value="<?php echo isset($data['date']) ? $data['date'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="arrival" class="form-label">Arrival:</label>
                    <input type="text" class="form-control datepicker" id="arrival" placeholder="Pilih tanggal arrival" name="arrival" value="<?php echo isset($data['arrival']) ? $data['arrival'] : ''; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        // Initialize datepicker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    </script>

</body>
</html>
