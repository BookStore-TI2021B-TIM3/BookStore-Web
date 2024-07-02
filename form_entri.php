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
        /* Penyesuaian untuk form */
        .form-label {
            margin-bottom: 0.5rem;
        }
        .form-control {
            margin-bottom: 1rem;
        }
        .input-group-text {
            background-color: #f5f5f5;
            border-color: #ced4da;
        }
        .invalid-feedback {
            display: block;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #dc3545;
        }
        .form-text {
            font-size: 0.875rem;
            color: #6c757d;
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

    <div class="d-flex flex-column flex-lg-row mt-5 mb-4">
        <!-- judul halaman -->
        <div class="flex-grow-1 d-flex align-items-center">
            <h3>Data Buku</h3>
        </div>
        <!-- breadcrumbs -->
        <div class="ms-5 ms-lg-0 pt-lg-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                    <li class="breadcrumb-item"><a href="?halaman=data" class="text-dark text-decoration-none">Books</a></li>
                    <li class="breadcrumb-item" aria-current="page">Entri</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
        <!-- judul form -->
        <div class="alert alert-primary rounded-4 mb-5" role="alert">
            <i class="fa-solid fa-pen-to-square me-2"></i> Entri Data Buku
        </div>
        <!-- form entri data -->
        <form action="proses_simpan.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

            <div class="row">
                <div class="col-xl-6">
                    <div class="mb-3">
                        <label class="form-label">Penulis <span class="text-danger">*</span></label>
                        <input type="text" name="author" class="form-control" autocomplete="off" required>
                        <div class="invalid-feedback">Nama penulis tidak boleh kosong.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Buku <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" autocomplete="off" required>
                        <div class="invalid-feedback">Judul buku tidak boleh kosong.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" name="price" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="invalid-feedback">Harga tidak boleh kosong.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rating <span class="text-danger">*</span></label>
                        <input type="number" step="0.1" name="rating" class="form-control" autocomplete="off" required>
                        <div class="invalid-feedback">Rating tidak boleh kosong.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sinopsis <span class="text-danger">*</span></label>
                        <textarea name="synopsis" rows="4" class="form-control" autocomplete="off" required></textarea>
                        <div class="invalid-feedback">Sinopsis tidak boleh kosong.</div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="mb-3">
                        <label class="form-label">Gambar Buku <span class="text-danger">*</span></label>
                        <input type="file" accept=".jpg, .jpeg, .png" id="imageUrl" name="imageUrl" class="form-control" autocomplete="off" required>
                        <div class="invalid-feedback">Gambar buku tidak boleh kosong.</div>

                        <div class="mt-3">
                            <img id="preview_image" src="images/img-default.png" class="border border-2 img-fluid rounded-4 shadow-sm" alt="Gambar Buku" width="240" height="240">
                        </div>

                        <div class="form-text mt-3">
                            Keterangan : <br>
                            - Tipe file yang bisa diunggah adalah *.jpg atau *.png. <br>
                            - Ukuran file yang bisa diunggah maksimal 1 Mb.
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-4 pb-2 mt-5 border-top">
            <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
                <!-- button simpan data -->
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary rounded-pill py-2 px-4">
                <!-- button kembali ke halaman tampil data -->
                <a href="?halaman=data" class="btn btn-secondary rounded-pill py-2 px-4">Batal</a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    // validasi file dan preview file sebelum diunggah
    document.getElementById('imageUrl').onchange = function() {
        // mengambil value dari file
        var fileInput = document.getElementById('imageUrl');
        var filePath = fileInput.value;
        var fileSize = fileInput.files[0].size;
        // tentukan extension file yang diperbolehkan
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        // Jika tipe file yang diunggah tidak sesuai dengan "allowedExtensions"
        if (!allowedExtensions.exec(filePath)) {
            alert("Tipe file tidak sesuai. Harap unggah file yang memiliki tipe *.jpg atau *.png.");
            // reset input file
            fileInput.value = "";
            // tampilkan file default
            document.getElementById("preview_image").src = "images/img-default.png";
        }
        // jika ukuran file yang diunggah lebih dari 1 Mb
        else if (fileSize > 1000000) {
            alert("Ukuran file lebih dari 1 Mb. Harap unggah file yang memiliki ukuran maksimal 1 Mb.");
            // reset input file
            fileInput.value = "";
            // tampilkan file default
            document.getElementById("preview_image").src = "images/img-default.png";
        }
        // jika file yang diunggah sudah sesuai, tampilkan preview file
        else {
            var reader = new FileReader();

            reader.onload = function(e) {
                // preview file
                document.getElementById("preview_image").src = e.target.result;
            };
            // membaca file sebagai data URL
            reader.readAsDataURL(this.files[0]);
        }
    };
</script>