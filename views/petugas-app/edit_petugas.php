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

    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $sql = "SELECT * FROM petugas WHERE id_petugas=$id";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);

    }

    if (isset($_POST['submit'])) {

        $id = $_GET['id'];
        
        if (updatePetugas($id) > 0) {
            echo "<script>
                alert('Data petugas berhasil di edit');
                window.location.href='list_petugas.php';
            </script>";
        }else {
            echo "<script>
                alert('Data petugas gagal di edit');
                window.location.href='list_petugas.php';
            </script>";
        }
        
    }

?>
<div class="row p-3">
<div class="col-md-9">

    <h2 class="h2">Form edit data petugas</h2>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_petugas" value="<?= $data['id_petugas']; ?>">
        <div class="form-group">
            <label for="nama">Nama petugas</label>
            <input id="nama" class="form-control" type="text" name="nama_petugas" required autocomplete="off" autofocus value="<?= $data['nama_petugas']; ?>">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" class="form-control" type="text" name="username" required autocomplete="off" value="<?= $data['username']; ?>">
        </div>
            <input id="password" class="form-control" type="hidden" name="password" value="<?= $data['password']; ?>">
        <div class="form-group">
            <label for="telp">Telepon</label>
            <input id="telp" class="form-control" type="number" name="telp" required autocomplete="off" value="<?= $data['telp']; ?>">
        </div>
        <input type="hidden" name="level" value="<?= $data['level']; ?>">
        <input type="submit" value="Update" name="submit" class="btn btn-primary">
        <a href="list_petugas.php" class="btn btn-danger">Kembali</a>
    </form>

</div>
</div>

<?php include "templates/dashboard/footer1.php"; ?>