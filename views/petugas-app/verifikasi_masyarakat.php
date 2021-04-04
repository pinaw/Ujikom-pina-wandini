<?php include "../../config/verifikasi_masyarakat.php"; ?>
<?php include "templates/dashboard/header1.php"; ?>

<?php 

    if (isset($_POST['cari_data'])) {
        $keyword = $_POST['kata_kunci'];
        $data = cariData($keyword);
    }else {
        $data = listMasyarakat();
    }

?>
<div class="row p-3">
<div class="col">
    <h2 class="h2">List data masyarakat</h2>
    <hr>

    <?php if(isset($_GET['pesan'])) : ?>
        <?php $pesan = $_GET['pesan']; ?>
        
        <?php if($pesan == "sukses_verif") : ?>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                Akun berhasil di verifikasi !!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if($pesan == "sukses_matikan") : ?>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                Akun berhasil di matikan !!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

    <?php endif; ?>

    <table class="table table-hover text-center table-striped" id="datatable">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nik</th>
            <th scope="col">Nama</th>
            <th scope="col">Telepon</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    <?php foreach($data as $data): ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data['nik']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['telp']; ?></td>
        <?php if($data['status'] == "aktif") : ?>
            <td class="text-success">Aktif</td>
            <td><a href="../../config/verifikasi_masyarakat.php?matikan=<?= $data['nik']; ?>" class="btn btn-block btn-danger">Matikan</a></td>
        <?php endif; ?>
        <?php if($data['status'] == "tidak") : ?>
            <td class="text-danger">Tidak aktif</td>
            <td><a href="../../config/verifikasi_masyarakat.php?verifikasi=<?= $data['nik']; ?>" class="btn btn-block btn-success">Aktifkan</a></td>
        <?php endif; ?>
        </tr>
    <?php $no++; ?>
    <?php endforeach; ?>
    </tbody>
    </table>

</div>
</div>


<?php include "templates/dashboard/footer1.php"; ?>