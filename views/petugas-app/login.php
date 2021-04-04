<?php include "templates/auth/header.php"; ?>
<?php include "../../config/auth.php"; ?>

<?php 

    if (isset($_SESSION['username'])) {
        header("location: index.php");
    }

    if (isset($_POST['submit'])) {
        if (loginPetugas() > 0) {
            header("location: index.php");
        }else {
            "tod";
        }
    }

?>

<div class="container">

    <?php if(isset($_GET['pesan'])) : ?>
        <?php $pesan = $_GET['pesan']; ?>
            <?php if($pesan == "password_salah") : ?>
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    Username atau password salah!!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($pesan == "gagal") : ?>
                <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                    Masukan data dengan benar!!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($pesan == "logout") : ?>
                <div class="alert alert-success alert-dismissible fade show mt-2 mt-2" role="alert">
                    Anda berhasil logout!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
    <?php endif; ?>

    <div class="row">
    
        <div class="col-md-5 mt-5 mx-auto">
        <h2 class="h2">Login Page Petugas</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" required autofocus autocomplete="off" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Masukan username">
            </div>
            <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" required autocomplete="off" class="form-control" id="password" placeholder="Masukan password">
            </div>
                <input type="submit" name="submit" value="Login" class="btn btn-block btn-primary">
                <a href="../index.php" class="btn btn-block btn-danger">Kembali</a>
        </form>
        </div>
        <!-- End Col md 5 -->

    </div>
    <!-- End Row -->

</div>
<!-- End Container -->
<?php include "templates/auth/footer.php"; ?>