<div class="d-flex flex-column flex-lg-row mt-5 mb-4">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <h3>Books</h3>
    </div>
    <!-- breadcrumbs -->
    <div class="ms-5 ms-lg-0 pt-lg-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="menu.php" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="?halaman=data" class="text-dark text-decoration-none">Books</a></li>
                <li class="breadcrumb-item" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>

<?php
// mengecek data GET "id"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol detail
    $id_buku = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "books" berdasarkan "id"
    $query = $mysqli->query("SELECT * FROM books WHERE id='$id_buku'")
                             or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
    // ambil data hasil query
    $data = $query->fetch_assoc();
}
?>

<div class="bg-white rounded-4 shadow-sm p-4 mb-5">
    <!-- judul form -->
    <div class="alert alert-primary rounded-4 mb-5" role="alert">
        <i class="fa-solid fa-list-ul me-2"></i> Detail Data Buku
    </div>
    <!-- tampilkan data -->
    <div class="d-flex flex-column flex-xl-row">
        <div class="flex-shrink-0 text-center mb-5 mb-xl-0">
            <div class="foto-profil-detail">
                <img src="assets/img/<?php echo $data['imageUrl']; ?>" class="border border-2 img-fluid rounded-4 shadow" alt="Cover Buku" width="240" height="240">
            </div>
        </div>
        <div class="flex-grow-1 text-muted fw-light ms-xl-5">
            <div class="table-responsive">
                <table class="table table-striped lh-lg">
                    <tr>
                        <td width="200">ID Buku</td>
                        <td width="10">:</td>
                        <td><?php echo $data['id']; ?></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td><?php echo $data['title']; ?></td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>:</td>
                        <td><?php echo $data['author']; ?></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td><?php echo $data['price']; ?></td>
                    </tr>
                    <tr>
                        <td>Rating</td>
                        <td>:</td>
                        <td><?php echo $data['rating']; ?></td>
                    </tr>
                    <tr>
                        <td>Sinopsis</td>
                        <td>:</td>
                        <td><?php echo $data['synopsis']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="pt-4 pb-2 mt-5 border-top">
        <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
            <!-- button kembali ke halaman tampil data -->
            <a href="?halaman=data" class="btn btn-primary rounded-pill py-2 px-4">Kembali</a>
        </div>
    </div>
</div>
