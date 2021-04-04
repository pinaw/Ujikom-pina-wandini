<?php include "../../config/koneksi.php"; ?>

<?php 

$nama = "Ceritanya admin";
$username = "admin";
$password = "admin";
$telp = "082112141098";
$level = "admin";

$sql = "INSERT INTO petugas VALUES('', '$nama', '$username', '$password', '$telp', '$level')";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0) {
    echo "sukses gan";
}
else{
    echo "gabisa";
}




?>