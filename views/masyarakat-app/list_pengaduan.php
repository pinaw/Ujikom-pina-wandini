<?php include "../../config/pengaduan.php"; ?>
<?php include "templates/dashboard/header.php"; ?>


<?php 

    $nik = $_SESSION['nik'];
    $data = listPengaduan($nik);

?>
<div class="row p-3">
    <div class="col">

        <h2 class="h2 mb-2 pl-2">List pengaduan <?= $_SESSION['username']; ?></h2>
        <hr>

        <?php if(isset($_GET['pesan'])) : ?>
        <?php $pesan = $_GET['pesan']; ?>
            <?php if($pesan == "berhasil_hapus") : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Laporan pengaduan berhasil di hapus !!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($pesan == "berhasil_edit") : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Laporan pengaduan berhasil di edit !!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($pesan == "gagal_edit") : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Laporan pengaduan gagal di edit !!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <table class="table table-hover text-center table-striped">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal pengaduan</th>
                <th scope="col">Judul pengaduan</th>
                <th scope="col">Status</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            <?php foreach($data as $data) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data['tgl_pengaduan']; ?></td>
                    <td><?= $data['judul_laporan']; ?></td>
                <?php if($data['status'] == "0") : ?>
                    <td class="text-danger">Belum di proses</td>
                <?php endif; ?>
                <?php if($data['status'] == "proses") : ?>
                    <td class="text-warning">Sedang di proses</td>
                <?php endif; ?>
                <?php if($data['status'] == "selesai") : ?>
                    <td class="text-success">Sudah di proses</td>
                <?php endif; ?>
                    <td>
                        <a href="detail_pengaduan.php?id=<?= $data['id_pengaduan']; ?>" class="btn btn-block btn-primary">Lihat Detail</a>
                    </td>
                </tr>
            <?php $no++; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "templates/dashboard/footer.php"; ?>