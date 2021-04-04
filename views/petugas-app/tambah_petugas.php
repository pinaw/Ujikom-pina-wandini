<?php include "templates/dashboard/header1.php"; ?>
<?php include "../../config/petugas.php"; ?>

<?php 


    if (!isset($_SESSION['username'])) {
        echo "<script>
            alert('Login terlebih dahulu');
            window.location.href='login.php';
        </script>";
    }

    if ($_SESSION['level'] != "admin") {
        echo "<script>
            alert('Anda bukan admin');
            window.location.href='index.php';
        </script>";
    }

    if (isset($_POST['submit'])) {
        if (tambahPetugas() > 0) {
            echo "<script>
                alert('Data petugas berhasil di buat');
                window.location.href='list_petugas.php';
            </script>";
        }else {
            echo "<script>
                alert('Data petugas gagal di buat');
                window.location.href='tambah_petugas.php';
            </script>";
        }
    }


?>
<div class="row p-3">
<div class="col-md-9">

    <h2 class="h2">Form tambah data petugas</h2>
    <hr>

    <?php if(isset($_GET['pesan'])) : ?>
    <?php $pesan = $_GET['pesan']; ?>
        <?php if($pesan == "sukses") : ?>
            <div class="alert alert-success alert-dismissible fade show">
                Data petugas berhasil di tambahkan!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if($pesan == "gagal") : ?>
            <div class="alert alert-danger alert-dismissible fade show">
                Data petugas gagal di tambahkan!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <form action="" method="post">
        <div class="form-group">
            <label for="nama">Nama petugas</label>
            <input id="nama" class="form-control" type="text" name="nama_petugas" autocomplete="off" required autofocus placeholder="Masukan nama petugas">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" class="form-control" type="text" name="username" autocomplete="off" required placeholder="Masukan username petugas">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" class="form-control" type="password" name="password" autocomplete="off" required placeholder="Masukan password petugas">
        </div>
        <div class="form-group">
            <label for="telp">telepon</label>
            <input id="telp" class="form-control" type="number" name="telp" autocomplete="off" required placeholder="Masukan telepon petugas">
        </div>
        <div class="form-group">
            <label>level</label>
            <select class="custom-select" name="level">
                <option selected value="petugas">Pilih level</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        <a href="list_petugas.php" class="btn btn-danger">Kembali</a>
    </form>

</div>
</div>

<?php include "templates/dashboard/footer1.php"; ?>