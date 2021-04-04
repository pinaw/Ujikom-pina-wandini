<?php require "../../config/auth.php"; ?>
<?php require "../../config/status_laporan.php"; ?>
<?php require "templates/dashboard/header.php"; ?>

<?php 

    if ($_SESSION['status'] == "tidak") {
      echo "<script>
        alert('Akun anda belum di aktif, silahkan menunggu di aktifkan oleh petugas');
        window.location.href='login.php';
      </script>";
        session_destroy();
    }

    $nik = $_SESSION['nik'];


?>

<div class="row p-3">

<div class="col">

    <!-- Start div Jumbotron -->
    <div class="jumbotron bg-success text-white">
        <div class="container">
            <h1 class="display-4">Selamat datang <?= $_SESSION['username']; ?></h1>
            <p class="lead">Selamat datang <?= $_SESSION['nama']; ?>, Ini adalah halaman utama dari website pengaduan masyarakat.</p>
        </div>
    </div>
    <!-- End div jumbotron -->
    <!-- Start div info card -->
    <div class="row mt-n3">
      <div class="col-md-8">
      <div class="card w-50 bg-primary text-white">
        <div class="card-body">
          <h5 class="card-title mb-3"><b>Info Pengaduan</b></h5>
          <p class="card-text">Laporan yang belum di proses : <?= belumProses($nik); ?></p>
          <p class="card-text">Laporan yang sedang di proses : <?= sedangProses($nik); ?></p>
          <p class="card-text">Laporan yang sudah di proses : <?= sudahProses($nik); ?></p>
          <p class="card-text">Total laporan : <?= totalProses($nik); ?></p>
        </div>
      </div>
      </div>
    </div>
    <!-- End div info card -->
</div>
</div>

<?php include "templates/dashboard/footer.php"; ?>