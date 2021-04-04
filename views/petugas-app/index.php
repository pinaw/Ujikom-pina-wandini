<?php include "templates/dashboard/header1.php"; ?>
<?php include "../../config/status_petugas.php"; ?>

<div class="row p-3">
<div class="col">

    <div class="jumbotron bg-success text-white">
    <div class="container">
        <h1 class="display-4">Selamat datang <?= $_SESSION['username']; ?></h1>
        <p class="lead">Hai <?= $_SESSION['nama']; ?>, Ini adalah halaman utama petugas di website pengaduan masyarakat.</p>
            <hr>
        <p class="lead">Kamu login sebagai : <?= $_SESSION['level']; ?></p>
    </div>
    </div>

    <!-- div row info -->
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    Status Akun Masyarakat
                </div>
                <div class="card-body">
                    <p class="card-text">Terverifikasi : <?= masyarakatTerverifikasi(); ?></p>
                    <p class="card-text">Belum diverifikasi : <?= masyarakatBelumTerverifikasi(); ?></p>
                    <p class="card-text">Total Akun : <?= masyarakatTotal(); ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    Status Akun Petugas
                </div>
                <div class="card-body">
                    <p class="card-text">Admin : <?= admin(); ?></p>
                    <p class="card-text">Petugas : <?= petugas(); ?></p>
                    <p class="card-text">Total Akun : <?= petugasTotal(); ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-secondary">
                <div class="card-header bg-secondary text-white">
                    Status Laporan
                </div>
                <div class="card-body">
                    <p class="card-text">Belum di proses : <?= laporanBelum(); ?></p>
                    <p class="card-text">Sedang di proses : <?= laporanProses(); ?></p>
                    <p class="card-text">Sudah di proses : <?= laporanSelesai(); ?></p>
                </div>
            </div>
        </div>  
    </div>
    <!-- end div row info -->

</div>
</div>

<?php include "templates/dashboard/footer1.php"; ?>