<div class="d-flex flex-column flex-lg-row mt-5 mb-4">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
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
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    $message = '';
    if ($pesan == 1) {
        $message = 'Data buku berhasil disimpan.';
    } elseif ($pesan == 2) {
        $message = 'Data buku berhasil diubah.';
    } elseif ($pesan == 3) {
        $message = 'Data buku berhasil dihapus.';
    }
    if ($message) {
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>Sukses!</strong> ' . $message . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
?>

<div class="row mb-5">
    <?php
    $paginasi_halaman = isset($_GET['paginasi']) ? (int)$_GET['paginasi'] : 1;
    $batas = 10;
    $batas_awal = ($paginasi_halaman - 1) * $batas;

    $query = $mysqli->query("SELECT id, title, author, price, rating, imageUrl FROM books ORDER BY id DESC LIMIT $batas_awal, $batas")
             or die('Ada kesalahan pada query tampil data: ' . $mysqli->error);
    $rows = $query->num_rows;

    if ($rows <> 0) {
        while ($data = $query->fetch_assoc()) { ?>
            <div class="p-2">
                <div class="d-flex bg-white rounded-4 shadow-sm">
                    <div class="flex-shrink-0 p-3">
                        <img src="assets/img/<?php echo $data['imageUrl']; ?>" class="border border-2 img-fluid rounded-4" alt="Cover Buku" width="100" height="100">
                    </div>
                    <div class="p-4 flex-grow-1">
                        <h5><?php echo $data['id']; ?> - <?php echo $data['title']; ?></h5>
                        <p class="text-muted"><?php echo $data['author']; ?> | <?php echo $data['price']; ?> | <?php echo $data['rating']; ?></p>
                    </div>
                    <div class="p-4">
                        <div class="d-flex flex-column flex-lg-row">
                            <a href="?halaman=detail&id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm rounded-pill px-3 me-2 mb-2 mb-lg-0"> Detail </a>
                            <a href="?halaman=ubah&id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm rounded-pill px-3 me-2 mb-2 mb-lg-0"> Update </a>
                            <button type="button" class="btn btn-danger btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalHapus<?php echo $data['id']; ?>"> Delete </button>
                        </div>
                    </div>
                </div>
            </div>

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
                            <p class="fw-bold mb-2"><?php echo $data['id']; ?> <span class="fw-normal">-</span> <?php echo $data['title']; ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                            <a href="proses_hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-danger rounded-pill px-3">Ya, Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="d-flex flex-column flex-xl-row align-items-center mt-4">
            <div class="flex-grow-1 text-center text-xl-start text-muted mb-3">
                <?php
                $query = $mysqli->query("SELECT id FROM books") or die('Ada kesalahan pada query jumlah data: ' . $mysqli->error);
                $jumlah_data = $query->num_rows;
                $jumlah_paginasi_halaman = ceil($jumlah_data / $batas);

                if ($jumlah_data <> 0) {
                    echo "Halaman $paginasi_halaman dari $jumlah_paginasi_halaman - Menampilkan $rows dari $jumlah_data data";
                }
                ?>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-sm justify-content-center justify-content-xl-end mb-0">
                    <?php
                    if ($paginasi_halaman == 1) { ?>
                        <li class="page-item disabled"><a class="page-link rounded-4" href="#">Pertama</a></li>
                        <li class="page-item disabled"><a class="page-link rounded-4" href="#">&laquo;</a></li>
                    <?php } else { ?>
                        <li class="page-item"><a class="page-link rounded-4" href="?halaman=data&paginasi=1">Pertama</a></li>
                        <li class="page-item"><a class="page-link rounded-4" href="?halaman=data&paginasi=<?php echo $paginasi_halaman - 1 ?>">&laquo;</a></li>
                    <?php }

                    $jumlah_number = 2;
                    $start_number = ($paginasi_halaman > $jumlah_number) ? $paginasi_halaman - $jumlah_number : 1;
                    $end_number = ($paginasi_halaman < ($jumlah_paginasi_halaman - $jumlah_number)) ? $paginasi_halaman + $jumlah_number : $jumlah_paginasi_halaman;

                    for ($i = $start_number; $i <= $end_number; $i++) {
                        if ($i == $paginasi_halaman) {
                            echo '<li class="page-item active"><a class="page-link rounded-4" href="#">' . $i . '</a></li>';
                        } else {
                            echo '<li class="page-item"><a class="page-link rounded-4" href="?halaman=data&paginasi=' . $i . '">' . $i . '</a></li>';
                        }
                    }

                    if ($paginasi_halaman == $jumlah_paginasi_halaman) { ?>
                        <li class="page-item disabled"><a class="page-link rounded-4" href="#">&raquo;</a></li>
                        <li class="page-item disabled"><a class="page-link rounded-4" href="#">Terakhir</a></li>
                    <?php } else { ?>
                        <li class="page-item"><a class="page-link rounded-4" href="?halaman=data&paginasi=<?php echo $paginasi_halaman + 1 ?>">&raquo;</a></li>
                        <li class="page-item"><a class="page-link rounded-4" href="?halaman=data&paginasi=<?php echo $jumlah_paginasi_halaman ?>">Terakhir</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    <?php
    } else { ?>
        <div class="text-center alert alert-danger alert-dismissible rounded-4 fade show mb-4" role="alert">
            <strong><i class="fa-solid fa-circle-info me-2"></i> Peringatan!</strong> Data tidak ditemukan.
        </div>
    <?php } ?>
</div>
