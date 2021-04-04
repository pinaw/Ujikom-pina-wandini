<?php include "templates/dashboard/header.php"; ?>
<?php include "../../config/pengaduan.php"; ?>

<?php

    @session_start();
    if (isset($_POST['submit'])) {
        if (buatPengaduan() > 0) {
            echo "<script>
                alert('Data pengaduan berhasil di buat');
                window.location.href='list_pengaduan.php';
            </script>"; 
        }
    }

?>

<div class="row p-3">
    <div class="col-lg-9">

        <h2 class="h2 mb-2 pl-2">Form buat pengaduan masyarakat</h2>
        <hr>
<!-- 
        <?php if(isset($_GET['pesan'])) :?>
        <?php $pesan = $_GET['pesan']; ?>
            <?php if($pesan == "berhasil") :?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Laporan pengaduan berhasil di buat !! <a href="list_pengaduan.php">Lihat hasil laporan</a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($pesan == "ukuran") :?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ukuran file tidak boleh lebih dari 10 mb !!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($pesan == "ext") :?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ekstensi file gambar harus berupa png atau jpg !!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        <?php endif; ?> -->

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul Laporan</label>
                <input type="text" name="judul" class="form-control" required placeholder="Masukan Judul Laporan" autofocus autocomplete="off">
            </div>
            <label for="">Masukan file foto</label>
            <div class="custom-file mb-1">
                <input type="file" name="foto"  required class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Foto harus berformat png atau jpg</label>
            </div>
            <div class="form-group">
                <label for="isi_laporan">Isi laporan</label>
                <textarea class="form-control" required id="isi_laporan" name="isi_laporan" rows="5" placeholder="Masukan Isi Laporan"></textarea>
            </div>
            <input type="submit" value="submit" name="submit" class="btn btn-primary">
            <a href="index.php" class="btn btn-danger">Kembali</a>
        </form>

    </div>
</div>

<?php include "templates/dashboard/footer.php"; ?>