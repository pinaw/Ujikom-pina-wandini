<?php include "templates/dashboard/header1.php"; ?>
<?php include "../../config/tanggapan.php"; ?>

<?php 

    if (!isset($_SESSION['username'])) {
        echo "<script>
            alert('Login terlebih dahulu');
            window.location.href='login.php';
        </script>";
    }

    $data = listTanggapan();

?>
<div class="row p-3">
<div class="col">

    <h2 class="h2">List data tanggapan</h2>
    <hr>

    <table class="table text-center table-hover table-striped" id="datatable">
        <thead>
            <tr>
                <td>No</td>
                <td>Judul Laporan</td>
                <td>Tanggal Tanggapan</td>
                <td>Id Petugas</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        <?php foreach($data as $data) :?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['judul_laporan']; ?></td>
                <td><?= $data['tgl_tanggapan']; ?></td>
                <td><?= $data['id_petugas']; ?></td>
                <?php if($data['status'] == "proses") : ?>
                    <td>
                        <p class="text-warning">Proses</p>
                    </td>
                    <td>
                        <a href="update_tanggapan.php?id=<?= $data['id_tanggapan']; ?>" class="btn btn-block btn-primary">Proses</a>
                    </td>
                <?php endif; ?>
                <?php if($data['status'] == "selesai") : ?>
                    <td>
                        <p class="text-success">Selesai</p>
                    </td>
                    <td>
                        <a href="update_tanggapan.php?id=<?= $data['id_tanggapan']; ?>" class="btn btn-block btn-success">lihat laporan</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
</div>
<?php include "templates/dashboard/footer1.php"; ?>