<?php require "koneksi.php"; ?>
<?php session_start(); ?>

<?php 

    if (isset($_GET['verifikasi'])) {
        $nik = $_GET['verifikasi'];
        if (verifikasiMasyarakat($nik) > 0) {
            header("location: ../views/petugas-app/verifikasi_masyarakat.php?pesan=sukses_verif");
        }
    }

    if (isset($_GET['matikan'])) {
        $nik = $_GET['matikan'];
        if (matikanMasyarakat($nik) > 0) {
            header("location: ../views/petugas-app/verifikasi_masyarakat.php?pesan=sukses_matikan");
        }
    }


?>

<?php 


    function listMasyarakat(){

        global $conn;

        $sql = "SELECT * FROM masyarakat";
        $query = mysqli_query($conn, $sql);

        return $query;
    }

    function cariData($keyword){

        global $conn;

        $sql = "SELECT * FROM masyarakat WHERE nik LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR telp LIKE '%$keyword%' OR status LIKE '%$keyword%'";
        $query = mysqli_query($conn, $sql);

        return $query;
    }

    function getDataMasyarakat($nik){

        global $conn;
        $sql = "SELECT * FROM masyarakat where nik='$nik'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);

        return $row;

    }

    function verifikasiMasyarakat($nik){

        global $conn;

        $row = getDataMasyarakat($nik);
        $nama = $row['nama'];
        $username = $row['username'];
        $password = $row['password'];
        $telp = $row['telp'];
        $status = "aktif";

        $sql = "UPDATE masyarakat SET nik='$nik', nama='$nama', username='$username', password='$password', telp='$telp', status='$status' WHERE nik='$nik'";
        $query = mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);

    }

    function matikanMasyarakat($nik){

        global $conn;

        $row = getDataMasyarakat($nik);
        $nama = $row['nama'];
        $username = $row['username'];
        $password = $row['password'];
        $telp = $row['telp'];
        $status = "tidak";

        $sql = "UPDATE masyarakat SET nik='$nik', nama='$nama', username='$username', password='$password', telp='$telp', status='$status' WHERE nik='$nik'";
        $query = mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
        
    }



?>