<?php include "templates/dashboard/header1.php"; ?>
<?php include "../../config/tanggapan.php"; ?>

<?php 

    if (!isset($_SESSION['username'])) {
      echo "<script>
        alert('Login terlebih dahulu');
        window.location.href='login.php';
      </script>";
    }

?>
<div class="row p-3">
<div class="col">

    <h2 class="h2">List data pengaduan</h2>
    <hr>
  
    <?php if(isset($_GET['pesan'])) : ?>
    <?php $pesan = $_GET['pesan']; ?>

      <?php if($pesan == "berhasil") : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Data pengaduan sedang di proses!!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <?php if($pesan == "gagal") : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data pengaduan gagal di proses!!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <?php if($pesan == "tanggapan") : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data pengaduan berhasil di tanggapi!!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

    <?php endif; ?>

    <table class="table text-center table-hover table-striped" id="datatable">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nik</th>
            <th scope="col">Judul pengaduan</th>
            <th scope="col">Tanggal pengaduan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $data = listPengaduan(); ?>
        <?php $no = 1; ?>
        <?php foreach($data as $data) : ?>
            <tr>
            <td><?= $no; ?></td>
            <td><?= $data['nik']; ?></td>
            <td><?= $data['judul_laporan']; ?></td>
            <td><?= $data['tgl_pengaduan']; ?></td>
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
                <?php if($data['status'] == "0") : ?>
                <a href="tanggapan.php?id=<?= $data['id_pengaduan']; ?>" class="btn btn-block btn-primary">Tanggapi</a>
                <?php endif; ?>
                <?php if($data['status'] == "proses") : ?>
                <p class="text-muted">Sudah di tanggapi</p>
                <?php endif; ?>
                <?php if($data['status'] == "selesai") : ?>
                <p class="text-muted">Sudah di proses</p>
                <?php endif; ?>
            </td>
            </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
</div>
<?php include "templates/dashboard/footer1.php"; ?>