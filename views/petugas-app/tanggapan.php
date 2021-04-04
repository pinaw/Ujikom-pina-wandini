<?php include "templates/dashboard/header1.php"; ?>
<?php include "../../config/tanggapan.php"; ?>

<?php 

    $server = $_SERVER['HTTP_HOST'].'/Ujikom/';

    if (!isset($_SESSION['username'])) {
        echo "<script>
            alert('Login terlebih dahulu');
            window.location.href='login.php';
        </script>";
    }

    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $data = getPengaduan($id);
    }

    if (isset($_POST['submit'])) {

        $id = $_GET['id'];
        if (buatTanggapan($id) > 0) {
            echo "<script>
                alert('Data pengaduan berhasil di tanggapi');
                window.location.href='list_tanggapan.php';
            </script>";
        }

    }
    
    
?>
<div class="row p-3">
<div class="col">

    <h2 class="h2">Form tanggapan pengaduan <?= $_SESSION['id']; ?></h2>
    <hr>

    <div class="row px-5">
        <div class="col-md-4">
        <img class="img-thumbnail" src="http://<?= $server; ?>assets/images/<?= $data['foto']; ?>" alt="">
        </div>
        <div class="col py-4">
            <p>Judul Pengaduan : <b><?= $data['judul_laporan']; ?></b></p>
            <p>Tanggal Pengaduan : <b><?= $data['tgl_pengaduan']; ?></b></p>
        <?php if($data['status'] == "0") : ?>
            <p>Status Pengaduan : <b>Belum di proses</b></p>
        <?php endif; ?>
        <?php if($data['status'] == "proses") : ?>
            <p>Status Pengaduan : <b>Sedang di proses</b></p>
        <?php endif; ?>
        <?php if($data['status'] == "selesai") : ?>
            <p>Status Pengaduan : <b>Sudah di proses</b></p>
        <?php endif; ?>
            <p>Isi Pengaduan :</p>
            <p><b><?= $data['isi_laporan']; ?></b></p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <form action="" method="post">
                <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan']; ?>">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Tanggapan petugas</label>
                    <textarea autofocus class="form-control" name="tanggapan" placeholder="Masukan tanggapan" id="exampleFormControlTextarea1" rows="4"></textarea>
                </div>
                    <input type="submit" value="Proses" class="btn btn-primary" name="submit">
                    <a href="list_pengaduan.php" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
    
</div>
</div>

<?php include "templates/dashboard/footer1.php"; ?>