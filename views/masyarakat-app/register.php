<?php include "templates/auth/header.php"; ?>
<?php include "../../config/auth.php"; ?>

<?php 

    if (isset($_SESSION['username'])) {
        header("location: index.php");
    }

    if (isset($_POST['submit'])) {
        if (registerMasyarakat() > 0) {
            header("location: login.php?pesan=berhasil_register");
        }else {
            header("location: register.php?pesan=gagal_regiser");
        }
    }

?>

<div class="container">

    <?php if(isset($_GET['pesan'])) : ?>
    <?php $pesan = $_GET['pesan']; ?>
        <?php if($pesan == "gagal_register") : ?>
            <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                Masukan data dengan benar!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Form register page -->
    <div class="row mt-3">
        <div class="col-md-7 mx-auto">
            <form action="" method="post">
                <h2>Register Page Masyarakat</h2>
                <div class="form-group">
                    <label for="nik">Nik</label>
                    <input type="number" name="nik" required autofocus autocomplete="off" class="form-control" id="nik" aria-describedby="emailHelp" placeholder="Masukan NIK">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" required name="nama" autocomplete="off" class="form-control" id="nama" placeholder="Masukan Nama">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" required name="username" autocomplete="off" class="form-control" id="username" placeholder="Masukan Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" autocomplete="off" class="form-control" placeholder="Masukan Password" id="">
                </div>
                <div class="form-group">
                    <label>Telp</label>
                    <input type="number" name="telpon" autocomplete="off" class="form-control" placeholder="Masukan Nomor Telp" id="">
                </div>
                <div class="form-group">
                    <p>Sudah punya akun? <a href="login.php">Login sekarang!!</a></p>
                </div>
                <input type="submit" value="Register" name="submit" class="btn-block btn btn-primary">
                <a href="../index.php" class="btn btn-block btn-danger">Kembali</a>
            </form>
        </div>
    </div>

</div>
<?php include "templates/auth/footer.php"; ?>