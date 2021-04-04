<?php include "../../config/pengaduan.php"; ?>
<?php include "templates/dashboard/header.php"; ?>


<?php 

    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $data = getEditPengaduan($id);

    }

    if (isset($_POST['submit'])) {
        
        if (updatePengaduan() > 0) {
            echo "<script>
                alert('Data pengaduan berhasil di edit');
                window.location.href='list_pengaduan.php';
            </script>"; 
        }else {
            echo "<script>
                alert('Data pengaduan gagal di edit');
                window.location.href='list_pengaduan.php';
            </script>"; 
        }

    }

?>
<div class="row p-3">
    <div class="col">

        <h2 class="h2 mb-2 pl-2">Form edit pegaduan masyarakat</h2>
        <hr>

        <form action="" enctype="multipart/form-data" method="post">
            <input type="hidden" value="<?= $data['id_pengaduan']; ?>" name="id_pengaduan">
            <input type="hidden" value="<?= $data['tgl_pengaduan']; ?>" name="tgl_pengaduan">
            <input type="hidden" name="nik" value="<?= $data['nik']; ?>">
            <input type="hidden" name="status" value="<?= $data['status']; ?>">
            <div class="form-group">
                <label for="judul">Judul laporan</label>
                <input id="judul" autocomplete="off" class="form-control" type="text" name="judul_laporan" required autofocus value="<?= $data['judul_laporan']; ?>">
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <label for="">Foto</label>
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="customFile">
                            <span><?= $data['foto']; ?></span>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img class="img-thumbnail" src="../../assets/images/<?= $data['foto']; ?>" alt="">
                </div>
            </div>
            <div class="form-group">
                <label for="my-input">Isi laporan</label>
                <textarea class="form-control" name="isi_laporan" id="exampleFormControlTextarea1" rows="5"><?= $data['isi_laporan']; ?></textarea>
            </div>
                <input type="submit" name="submit" value="Update" class="btn btn-primary">
                <a href="detail_pengaduan.php?id=<?= $data['id_pengaduan']; ?>" class="btn btn-danger">Kembali</a>
        </form>

    </div>
</div>

<?php include "templates/dashboard/footer.php"; ?>