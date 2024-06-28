<?php
include "connection/db_connect.php"; 

// mengecek data GET "id"
if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    $query = $mysqli->query("SELECT * FROM books WHERE id='$id_buku'") 
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

    <main class="content-container container">
        <div class="d-flex flex-column flex-lg-row mt-5 mb-4">
            <div class="flex-grow-1 d-flex align-items-center">
                <i class="fa-regular fa-book icon-title"></i>
                <h3>Ubah Buku</h3>
            </div>
            <div class="ms-5 ms-lg-0 pt-lg-2">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item"><a href="index.php" class="text-dark text-decoration-none">Buku</a></li>
                        <li class="breadcrumb-item" aria-current="page">Ubah</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
            <div class="alert alert-primary rounded-4 mb-5" role="alert">
                <i class="fa-solid fa-pen-to-square me-2"></i> Ubah Data Buku
            </div>
            <form action="proses_ubah.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                
                <div class="mb-3">
                    <label class="form-label">Judul Buku <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo isset($data['title']) ? $data['title'] : ''; ?>" required>
                    <div class="invalid-feedback">Judul buku tidak boleh kosong.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga <span class="text-danger">*</span></label>
                    <input type="number" name="price" class="form-control" value="<?php echo isset($data['price']) ? $data['price'] : ''; ?>" required>
                    <div class="invalid-feedback">Harga tidak boleh kosong.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rating <span class="text-danger">*</span></label>
                    <input type="number" step="0.1" max="5" name="rating" class="form-control" value="<?php echo isset($data['rating']) ? $data['rating'] : ''; ?>" required>
                    <div class="invalid-feedback">Rating tidak boleh kosong.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sinopsis <span class="text-danger">*</span></label>
                    <textarea name="synopsis" rows="4" class="form-control" required><?php echo isset($data['synopsis']) ? $data['synopsis'] : ''; ?></textarea>
                    <div class="invalid-feedback">Sinopsis tidak boleh kosong.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Buku</label>
                    <input type="file" accept=".jpg, .jpeg, .png" id="imageUrl" name="imageUrl" class="form-control">
                    <div class="mt-4">
                        <img id="preview_image" src="images/<?php echo isset($data['imageUrl']) ? $data['imageUrl'] : 'img-default.png'; ?>" class="border border-2 img-fluid rounded-4 shadow-sm" alt="Gambar Buku" width="240" height="240">
                    </div>
                    <div class="form-text mt-4">
                        Keterangan : <br>
                        - Tipe file yang bisa diunggah adalah *.jpg atau *.png. <br>
                        - Ukuran file yang bisa diunggah maksimal 1 Mb.
                    </div>
                </div>

                <div class="pt-4 pb-2 mt-5 border-top">
                    <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary rounded-pill py-2 px-4">
                        <a href="index.php" class="btn btn-secondary rounded-pill py-2 px-4">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76A8fQYt/3pSb8L5dptZt+P5z8eF8c95d/wCpXhk5l7/N8A6pB5qq2j7pT1z4Md" crossorigin="anonymous"></script>
    <script>
        // Preview image script
        document.getElementById("imageUrl").addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById("preview_image").setAttribute("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
