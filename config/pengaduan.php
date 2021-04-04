<?php require "koneksi.php"; ?>
<?php @session_start(); ?>

<?php 


if (isset($_GET['hapus_pengaduan'])) {
    $id = $_GET['hapus_pengaduan'];
    if (hapusPengaduan($id) > 0) {
        @header("location: ../views/masyarakat-app/list_pengaduan.php?pesan=berhasil_hapus");
    }
}


function uploadGambar(){

    $allExt = array("png", "jpg", "jpeg");
    $nama = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];
    $tmp = $_FILES['foto']['tmp_name'];
    $x = explode(".", $nama);
    $ext = strtolower(end($x));

    $namaBaru = "IMG-" . uniqid() . "." . $ext;

    if (in_array($ext, $allExt) === true) {
        if ($size > 1000000) {
            echo "<script>
                alert('Ukuran file gambar tidak boleh lebih dari 10 mb');
                window.location.href='buat_pengaduan.php';
            </script>"; 
            exit;
        }else {
            move_uploaded_file($tmp, "../../assets/images/" . $namaBaru);
        }
    }else {
        echo "<script>
                alert('File extensi harus berupa png atau jpg');
                window.location.href='buat_pengaduan.php';
            </script>"; 
        exit;
    }

    return $namaBaru;
    
}

function buatPengaduan(){

    global $conn;

    $tgl = date("Y-m-d");
    $nik = $_SESSION['nik'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi_laporan'];
    $foto = uploadGambar();
    $status = "0";

    $sql = "INSERT INTO pengaduan VALUES('', '$tgl', '$nik', '$judul', '$isi', '$foto', '$status')";
    $query = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);

}

function listPengaduan($nik){

    global $conn;

    $sql = "SELECT id_pengaduan, tgl_pengaduan, judul_laporan, status FROM pengaduan WHERE nik=$nik";
    $query = mysqli_query($conn, $sql);

    return $query;
    
}

function getEditPengaduan($id){

    global $conn;

    $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=$id";
    $query = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($query);

}

function detailPengaduan($id){

    global $conn;

    $sql = "SELECT * FROM pengaduan  LEFT JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan WHERE pengaduan.id_pengaduan='$id'";
    $query = mysqli_query($conn, $sql);

    return $query;
    
}

//Mengambil data foto lalu di arahkan ke function hapusPengaduan
function getDataHapusFoto($id){

    global $conn;

    $sql = "SELECT foto FROM pengaduan WHERE id_pengaduan=$id";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    $foto = $data['foto'];
    return $foto;

}

function hapusTanggapan($id){

    global $conn;

    $sql = "DELETE FROM tanggapan WHERE id_pengaduan='$id'";
    $query = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);

}

function hapusPengaduan($id){

    global $conn;

    $tanggapan = hapusTanggapan($id);
    $hapusFoto = getDataHapusFoto($id);
    $sql = "DELETE FROM pengaduan WHERE id_pengaduan =$id";
    $hapus = unlink("../assets/images/" . $hapusFoto);
    $query = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);

}

function updateFotoPengaduan($id){

    global $conn;

    $allExt = array("png", "jpg");
    $nama = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];
    $tmp = $_FILES['foto']['tmp_name'];
    $x = explode(".", $nama);
    $ext = strtolower(end($x));

    $namaBaru = "IMG-" . uniqid() . "." . $ext;

    $sql = "SELECT foto FROM pengaduan WHERE id_pengaduan=$id";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    if ($nama != "") {

        if (in_array($ext, $allExt) === true) {
            if ($size > 1000000) {
                @header("location: buat_pengaduan.php?pesan=ukuran");
                exit;
            }else {
                unlink("../../assets/images/" . $data['foto']);
                move_uploaded_file($tmp, "../../assets/images/" . $namaBaru);
                $foto = $namaBaru;
            }
        }

    }else {
        $foto = $data['foto'];
    }

    return $foto;

}

function updatePengaduan(){

    global $conn;

    $id = $_POST['id_pengaduan'];
    $tgl = $_POST['tgl_pengaduan'];
    $nik = $_POST['nik'];
    $status = $_POST['status'];
    $judul = $_POST['judul_laporan'];
    $isi = $_POST['isi_laporan'];
    $foto  = updateFotoPengaduan($id);

    $sql = "UPDATE pengaduan SET id_pengaduan='$id', tgl_pengaduan='$tgl', nik='$nik', judul_laporan='$judul', isi_laporan='$isi', foto='$foto', status='$status' WHERE id_pengaduan=$id";
    $query = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);

}



?>