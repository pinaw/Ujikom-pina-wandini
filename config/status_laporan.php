<?php require "koneksi.php"; ?>

<?php 


//Function untuk melihat info card status laporan

function belumProses($nik){

    global $conn;

    $sql = "SELECT status FROM pengaduan WHERE nik = $nik AND status = '0'";
    $query = mysqli_query($conn, $sql);

    return mysqli_num_rows($query);
    
}

function sedangProses($nik){

    global $conn;

    $sql = "SELECT status FROM pengaduan WHERE nik = $nik AND status = 'proses'";
    $query = mysqli_query($conn, $sql);

    return mysqli_num_rows($query);
    
}

function sudahProses($nik){

    global $conn;

    $sql = "SELECT status FROM pengaduan WHERE nik = $nik AND status = 'selesai'";
    $query = mysqli_query($conn, $sql);

    return mysqli_num_rows($query);

}

function totalProses($nik){

    global $conn;

    $sql = "SELECT status FROM pengaduan WHERE nik = $nik";
    $query = mysqli_query($conn, $sql);

    return mysqli_num_rows($query);

}



?>