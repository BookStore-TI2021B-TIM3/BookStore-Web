<div class="d-flex flex-column flex-lg-row mt-5 mb-4">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <i class="fa-regular fa-book icon-title"></i>
        <h3>Books</h3>
    </div>
    <!-- breadcrumbs -->
    <div class="ms-5 ms-lg-0 pt-lg-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="?halaman=data" class="text-dark text-decoration-none">Books</a></li>
                <li class="breadcrumb-item" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row flex-lg-row-reverse align-items-center mb-5">
    <!-- button entri data -->
    <div class="col-lg-4 col-xl-3">
        <a href="?halaman=entri" class="btn btn-primary rounded-pill float-lg-end py-2 px-4 mb-4 mb-lg-0">
            <i class="fa-solid fa-plus me-2"></i> Add Data Buku
        </a>
    </div>
    <!-- form pencarian -->
    <div class="col-lg-8 col-xl-9">
        <form action="?halaman=pencarian" method="post" class="form-search needs-validation" novalidate>
            <input type="text" name="kata_kunci" class="form-control rounded-pill" placeholder="Cari Buku ..." autocomplete="off" required>
            <div class="invalid-feedback">Masukan judul buku yang ingin Anda cari.</div>
        </form>
    </div>
</div>

<?php
// menampilkan pesan sesuai dengan proses yang dijalankan
// jika pesan tersedia
if (isset($_GET['pesan'])) {
    // jika pesan = 1
    if ($_GET['pesan'] == 1) {
        // tampilkan pesan sukses simpan data
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>Sukses!</strong> Data buku berhasil disimpan.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    // jika pesan = 2
    elseif ($_GET['pesan'] == 2) {
        // tampilkan pesan sukses ubah data
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>Sukses!</strong> Data buku berhasil diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    // jika pesan = 3
    elseif ($_GET['pesan'] == 3) {
        // tampilkan pesan sukses hapus data
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>Sukses!</strong> Data buku berhasil dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}
?>

<div class="row mb-5">
    <?php
    /* 
        membatasi jumlah data yang ditampilkan dari database untuk membuat pagination/paginasi
    */
    // cek data "paginasi" pada URL untuk mengetahui paginasi halaman aktif
    // jika data "paginasi" ada, maka paginasi halaman = data "paginasi". jika data "paginasi" tidak ada, maka paginasi halaman = 1
    $paginasi_halaman = (isset($_GET['paginasi'])) ? (int) $_GET['paginasi'] : 1;
    // tentukan jumlah data yang ditampilkan per paginasi halaman
    $batas = 10;
    // tentukan dari data ke berapa yang akan ditampilkan pada paginasi halaman
    $batas_awal = ($paginasi_halaman - 1) * $batas;

    // sql statement untuk menampilkan data dari tabel "books"
    $query = $mysqli->query("SELECT id, title, price, rating, synopsis, imageUrl FROM books
                             ORDER BY id DESC LIMIT $batas_awal, $batas")
                             or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
    // ambil jumlah data hasil query
    $rows = $query->num_rows;

    // cek hasil query
    // jika data buku ada
    if ($rows <> 0) {
        // ambil data hasil query
        while ($data = $query->fetch_assoc()) { ?>
            <!-- tampilkan data -->
            <div class="p-2">
                <div class="d-flex bg-white rounded-4 shadow-sm">
                    <div class="flex-shrink-0 p-3">
                        <img src="images/<?php echo $data['imageUrl']; ?>" class="border border-2 img-fluid rounded-4" alt="Cover Buku" width="100" height="100">
                    </div>
                    <div class="p-4 flex-grow-1">
                        <h5><?php echo $data['id']; ?> - <?php echo $data['title']; ?></h5>
                        <p class="text-muted"><?php echo $data['price']; ?> | <?php echo $data['rating']; ?> | <?php echo $data['synopsis']; ?></p>
                    </div>
                    <div class="p-4">
                        <div class="d-flex flex-column flex-lg-row">
                            <!-- button form detail data -->
                            <a href="?halaman=detail&id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm rounded-pill px-3 me-2 mb-2 mb-lg-0"> Detail </a>
                            <!-- button form ubah data -->
                            <a href="?halaman=ubah&id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm rounded-pill px-3 me-2 mb-2 mb-lg-0"> Update </a>
                            <!-- button modal hapus data -->
                            <button type="button" class="btn btn-danger btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalHapus<?php echo $data['id']; ?>"> Delete </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal hapus data -->
            <div class="modal fade" id="modalHapus<?php echo $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                <i class="fa-regular fa-trash-can me-2"></i> Hapus Data Buku
                            </h1>
                        </div>
                        <div class="modal-body">
                            <p class="mb-2">Anda yakin ingin menghapus data buku?</p>
                            <!-- informasi data yang akan dihapus -->
                            <p class="fw-bold mb-2"><?php echo $data['id']; ?> <span class="fw-normal">-</span> <?php echo $data['title']; ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                            <!-- button proses hapus data -->
                            <a href="proses_hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-danger rounded-pill px-3">Ya, Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="d-flex flex-column flex-xl-row align-items-center mt-4">
            <!-- menampilkan informasi jumlah paginasi halaman dan jumlah data -->
            <div class="flex-grow-1 text-center text-xl-start text-muted mb-3">
                <?php
                // sql statement untuk menampilkan jumlah data pada tabel "books"
                $query = $mysqli->query("SELECT id FROM books")
                                         or die('Ada kesalahan pada query jumlah data : ' . mysqli_error($mysqli));
                // ambil jumlah data dari hasil query
                $jumlah_data = $query->num_rows;

                // hitung jumlah paginasi halaman yang tersedia
                $jumlah_paginasi_halaman = ceil($jumlah_data / $batas);

                // cek jumlah data
                // jika data ada
                if ($jumlah_data <> 0) {
                    // tampilkan informasi paginasi halaman aktif dan jumlah paginasi halaman
                    echo "Halaman $paginasi_halaman dari $jumlah_paginasi_halaman - Menampilkan $rows dari $jumlah_data data";
                }
                ?>
            </div>

            <!-- navigasi paginasi -->
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-sm justify-content-center justify-content-xl-end mb-0">
                    <!-- button navigasi ke paginasi halaman pertama -->
                    <?php
                    // jika paginasi halaman = 1 (paginasi halaman aktif)
                    // maka button dalam keadaan disable
                    if ($paginasi_halaman == 1) { ?>
                        <li class="page-item disabled"><a class="page-link rounded-4" href="#">Pertama</a></li>
                        <li class="page-item disabled"><a class="page-link rounded-4" href="#">&laquo;</a></li>
                    <?php
                    }
                    // jika paginasi halaman > 1
                    // maka button dalam keadaan aktif dan berfungsi sebagai link untuk menuju paginasi halaman sebelumnya
                    else { ?>
                        <li class="page-item"><a class="page-link rounded-4" href="?halaman=data&paginasi=1">Pertama</a></li>
                        <li class="page-item"><a class="page-link rounded-4" href="?halaman=data&paginasi=<?php echo $paginasi_halaman - 1 ?>">&laquo;</a></li>
                    <?php } ?>

                    <!-- button navigasi paginasi halaman -->
                    <?php
                    // tentukan jumlah paginasi halaman yang akan ditampilkan
                    $jumlah_number = 2; // jumlah paginasi halaman ke kanan dan kiri dari paginasi halaman aktif
                    $start_number = ($paginasi_halaman > $jumlah_number) ? $paginasi_halaman - $jumlah_number : 1;
                    $end_number = ($paginasi_halaman < ($jumlah_paginasi_halaman - $jumlah_number)) ? $paginasi_halaman + $jumlah_number : $jumlah_paginasi_halaman;

                    for ($i = $start_number; $i <= $end_number; $i++) {
                        // jika $i = paginasi halaman aktif
                        // maka button dalam keadaan disable dan ditandai dengan warna
                        if ($i == $paginasi_halaman) {
                            echo '<li class="page-item active"><a class="page-link rounded-4" href="#">' . $i . '</a></li>';
                        }
                        // jika $i bukan paginasi halaman aktif
                        // maka button dalam keadaan aktif dan berfungsi sebagai link untuk menuju paginasi halaman ke-$i
                        else {
                            echo '<li class="page-item"><a class="page-link rounded-4" href="?halaman=data&paginasi=' . $i . '">' . $i . '</a></li>';
                        }
                    }
                    ?>

                    <!-- button navigasi ke paginasi halaman terakhir -->
                    <?php
                    // jika paginasi halaman = jumlah paginasi halaman (paginasi halaman aktif)
                    // maka button dalam keadaan disable
                    if ($paginasi_halaman == $jumlah_paginasi_halaman) { ?>
                        <li class="page-item disabled"><a class="page-link rounded-4" href="#">&raquo;</a></li>
                        <li class="page-item disabled"><a class="page-link rounded-4" href="#">Terakhir</a></li>
                    <?php
                    }
                    // jika paginasi halaman tidak sama dengan jumlah paginasi halaman
                    // maka button dalam keadaan aktif dan berfungsi sebagai link untuk menuju paginasi halaman terakhir
                    else { ?>
                        <li class="page-item"><a class="page-link rounded-4" href="?halaman=data&paginasi=<?php echo $paginasi_halaman + 1 ?>">&raquo;</a></li>
                        <li class="page-item"><a class="page-link rounded-4" href="?halaman=data&paginasi=<?php echo $jumlah_paginasi_halaman ?>">Terakhir</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    <?php
    }
    // jika data buku tidak ada
    else { ?>
        <!-- tampilkan pesan data tidak ditemukan -->
        <div class="text-center alert alert-danger alert-dismissible rounded-4 fade show mb-4" role="alert">
            <strong><i class="fa-solid fa-circle-info me-2"></i> Peringatan!</strong> Data tidak ditemukan.
        </div>
    <?php } ?>
</div>
