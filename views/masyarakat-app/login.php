<?php include "templates/auth/header.php"; ?>
<?php include "../../config/auth.php"; ?>
<?php 

    if (isset($_SESSION['username'])) {
        header("location: index.php");
    }

    if (isset($_POST['submit'])) {
        if (loginMasyarakat() > 0) {
            header("location: index.php");
        }
    }

?>

<div class="container">

    <!-- Alert Pesan -->
    <?php if(isset($_GET['pesan'])) : ?>
    <?php $pesan = $_GET['pesan']; ?>
        <?php if($pesan == "berhasil_register") : ?>
            <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
                Akun berhasil di buat, harap menunggu untuk verifikasi akun !!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if($pesan == "login_gagal") : ?>
            <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                Username atau password yang anda masukan salah !!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if($pesan == "logout") : ?>
            <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
                Anda berhasil logout !!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if($pesan == "aktif") : ?>
            <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                Akun anda belum di aktivasi, harap menunggu untuk di aktivasi terlebih dahulu !!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Bagian form login page -->
    <div class="row mt-5">
        <div class="col-md-5 mx-auto">
            <form action="" method="post">
                <h2>Login Page Masyarakat</h2>
                <div class="form-group">
                    <label for="nik">Nik</label>
                    <input type="number" name="nik" required autofocus autocomplete="off" class="form-control" id="nik" aria-describedby="emailHelp" placeholder="Masukan Nik">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" required autocomplete="off" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Masukan Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" required name="password" autocomplete="off" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <p>Tidak punya akun? <a href="register.php">Register sekarang!!</a></p>
                </div>
                <input type="submit" value="Login" name="submit" class="btn-block btn btn-primary">
                <a href="../index.php" class="btn btn-block btn-danger">Kembali</a>
            </form>
        </div>
    </div>

</div>

<?php include "templates/auth/footer.php"; ?>