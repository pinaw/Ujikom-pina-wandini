<?php require "koneksi.php"; ?>

<?php 


    function masyarakatTerverifikasi(){

        global $conn;

        $sql = "SELECT status FROM masyarakat WHERE status='aktif'";
        $query = mysqli_query($conn, $sql);

        return mysqli_num_rows($query);
        
    }

    function masyarakatBelumTerverifikasi(){

        global $conn;

        $sql = "SELECT status FROM masyarakat WHERE status='tidak'";
        $query = mysqli_query($conn, $sql);

        return mysqli_num_rows($query);
        
    }

    function masyarakatTotal(){

        global $conn;

        $sql = "SELECT status FROM masyarakat";
        $query = mysqli_query($conn, $sql);

        return mysqli_num_rows($query);
        
    }

    function admin(){

        global $conn;

        $sql = "SELECT level FROM petugas WHERE level = 'admin'";
        $query = mysqli_query($conn, $sql);

        return mysqli_num_rows($query);
        
    }

    function petugas(){

        global $conn;

        $sql = "SELECT level FROM petugas WHERE level = 'petugas'";
        $query = mysqli_query($conn, $sql);

        return mysqli_num_rows($query);
        
    }

    function petugasTotal(){

        global $conn;

        $sql = "SELECT level FROM petugas";
        $query = mysqli_query($conn, $sql);

        return mysqli_num_rows($query);
        
    }

    function laporanBelum(){
    
        global $conn;
    
        $sql = "SELECT status FROM pengaduan WHERE status='0'";
        $query = mysqli_query($conn, $sql);
    
        return mysqli_num_rows($query);
    
    }

    function laporanProses(){
    
        global $conn;
    
        $sql = "SELECT status FROM pengaduan WHERE status='proses'";
        $query = mysqli_query($conn, $sql);
    
        return mysqli_num_rows($query);
    
    }
    
    function laporanSelesai(){
    
        global $conn;
    
        $sql = "SELECT status FROM pengaduan WHERE status='selesai'";
        $query = mysqli_query($conn, $sql);
    
        return mysqli_num_rows($query);
    
    }

    
?>