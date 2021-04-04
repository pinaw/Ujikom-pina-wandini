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

  if (isset($_POST['cari'])) {

    $keyword = $_POST['kata_kunci'];
    $data = cariPetugas($keyword);

  }else {

    $data = listPetugas();
    
  }

?>
<div class="row p-3">
  <div class="col">
    <h2 class="h2">List data petugas</h2>
    <hr>
    <div class="row justify-content-between mb-3">
      <div class="col-9">
        <form action="" method="post" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" name="kata_kunci" autofocus autocomplete="off" type="search" placeholder="Cari data petugas" aria-label="Search">
          <input type="submit" value="Search" name="cari" class="btn btn-outline-success my-2 my-sm-0">
        </form>
      </div>
        <div class="col">
          <a href="tambah_petugas.php" class="btn btn-primary">Tambah data petugas</a>
        </div>
    </div>

    <?php if(isset($_GET['pesan'])) : ?>
    <?php $pesan = $_GET['pesan']; ?>

      <?php if($pesan == "sukses") : ?>
        <div class="alert alert-success alert-dismissible fade show">
            Data petugas berhasil di update!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php endif; ?>
      <?php if($pesan == "gagal") : ?>
        <div class="alert alert-danger alert-dismissible fade show">
            Data petugas gagal di update!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php endif; ?>
      <?php if($pesan == "hapus") : ?>
        <div class="alert alert-success alert-dismissible fade show">
            Data petugas berhasil di hapus!!
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
          <th scope="col">Nama petugas</th>
          <th scope="col">Username</th>
          <th scope="col">Telepon</th>
          <th>Level</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php $no = 1; ?>
        <?php foreach($data as $data) : ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $data['nama_petugas']; ?></td>
            <td><?= $data['username']; ?></td>
            <td><?= $data['telp']; ?></td>
            <td>
              <?php if($data['level'] == "admin") : ?>
                <p class="text-danger">Admin</p>
              <?php endif; ?>
              <?php if($data['level'] == "petugas") : ?>
                <p class="text-success">Petugas</p>
              <?php endif; ?>
            </td>
            <td>
              <?php if($_SESSION['level'] == "admin") : ?>
                <a href="edit_petugas.php?id=<?= $data['id_petugas']; ?>" class="btn btn-primary">Edit</a>
                <a href="../../config/petugas.php?hapus=<?= $data['id_petugas']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
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