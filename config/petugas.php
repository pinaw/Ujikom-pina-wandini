<?php require "koneksi.php"; ?>

<?php 

    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        if (hapusPetugas($id) > 0) {
            echo "<script>
                alert('Data petugas berhasil di hapus');
                window.location.href='../views/petugas-app/list_petugas.php';
            </script>";
        }
    }

?>

<?php 


    function listPetugas(){

        global $conn;

        $sql = "SELECT * FROM petugas";
        $query = mysqli_query($conn, $sql);

        return $query;

    }

    function tambahPetugas(){

        global $conn;

        $nama = $_POST['nama_petugas'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];
        $level = $_POST['level'];

        $sql = "INSERT INTO petugas VALUES('', '$nama', '$username', '$password', '$telp', '$level')";
        $query = mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);

    }

    function cariPetugas($keyword){

        global $conn;
    
        $sql = "SELECT * FROM petugas WHERE nama_petugas LIKE '%$keyword%' OR username LIKE '%$keyword%' OR level LIKE '%$keyword%'";
        $query = mysqli_query($conn, $sql);
        
        return $query;
    
    }

    function hapusPetugas($id){

        global $conn;

        $sql ="DELETE FROM petugas WHERE id_petugas='$id'";
        $query = mysqli_query($conn, $sql);
    
        return mysqli_affected_rows($conn);

    }

    function updatePetugas($id){
        global $conn;
        $id_petugas = $_POST['id_petugas'];
        $nama = $_POST['nama_petugas'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];
        $level = $_POST['level'];
    
        $sql = "UPDATE petugas SET id_petugas='$id_petugas', nama_petugas='$nama', username='$username', password='$password', telp='$telp', level='$level' WHERE id_petugas='$id'";
        $query= mysqli_query($conn, $sql);
    
        return mysqli_affected_rows($conn);
    
    }


?>