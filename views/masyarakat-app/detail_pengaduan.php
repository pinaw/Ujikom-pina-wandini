<?php include "../../config/pengaduan.php"; ?>
<?php include "templates/dashboard/header.php"; ?>


<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = detailPengaduan($id);
    }else {
        @header("location: index.php");
        exit;
    }

?>
<div class="row p-3">
    <div class="col">

        <?php foreach($data as $data) : ?>
        <h2 class="h2 pl-2">Detail pengaduan masyarakat</h2>
        <hr>

            <div class="row">
                <div class="col-md-4">
                    <img class="img-thumbnail" src="../../assets/images/<?= $data['foto']; ?>" alt="">
                </div>
                <div class="col">

                    <div class="row">
                        <div class="col">
                            <p>Judul Pengaduan</p>
                            <p>Tanggal Pengaduan</p>
                            <p>Status pengaduan</p>
                        </div>
                        <div class="col">
                            <p class="font-weight-bold"><?= $data['judul_laporan']; ?></p>
                            <p class="font-weight-bold"><?= $data['tgl_pengaduan']; ?></p>

                        <?php if($data['status'] == "0") : ?>
                            <p class="font-weight-bold">Belum di proses</p>
                        <?php endif; ?>

                        <?php if($data['status'] == "proses") : ?>
                            <p class="font-weight-bold">Sedang di proses</p>
                        <?php endif; ?>

                        <?php if($data['status'] == "selesai") : ?>
                            <p class="font-weight-bold">Sudah di proses</p>
                        <?php endif; ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="d-block">Isi laporan :</p>
                            <p class="font-weight-bold text-justify"><?= $data['isi_laporan']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3 mb-3">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            Tanggapan dari petugas
                        </div>
                        <div class="card-body">
                            <?php if($data['tanggapan'] == NULL) : ?>
                                <h5 class="text-muted">Ups, Sepertinya laporan anda belum di tanggapi oleh petugas, harap menunggu</h5>
                            <?php else: ?>
                                <h5><?= $data['tanggapan']; ?></h5>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        <div class="row mt-2 justify-content-end">

            <div class="col-4">
            <a class="btn btn-primary" href="list_pengaduan.php">Kembali</a>
            <a href="edit_pengaduan.php?id=<?= $id; ?>" class="btn btn-info">Edit</a>
            <a href="../../config/pengaduan.php?hapus_pengaduan=<?= $id; ?>" onclick="return confirm('Apa anda yakin ingin menghapus pengaduan ini?')" class="btn btn-danger">Hapus</a>
            </div>
            
        </div>

    </div>
</div>


<?php include "templates/dashboard/footer.php"; ?>