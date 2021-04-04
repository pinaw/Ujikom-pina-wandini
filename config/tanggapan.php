<?php require "koneksi.php"; ?>
<?php @session_start(); ?>

<?php 

    //list pengaduan untuk tanggapan.php
    function listPengaduan(){

        global $conn;

        $sql = "SELECT * FROM pengaduan";
        $query = mysqli_query($conn, $sql);

        return $query;

    }


    //untuk mengambil data dari table pengaduan
    function getPengaduan($id){

        global $conn;
    
        $sql = "SELECT * FROM pengaduan WHERE id_pengaduan = $id";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);
    
        return $data;
    
    }

    //untuk update data pengaduan dari '0' ke 'proses'
    function prosesUpdatePengaduan($id){

        global $conn;
        $data = getPengaduan($id);
        $tgl = $data['tgl_pengaduan'];
        $nik = $data['nik'];
        $judul = $data['judul_laporan'];
        $isi = $data['isi_laporan'];
        $foto = $data['foto'];
        $status = "proses";
    
        $sql = "UPDATE pengaduan SET id_pengaduan='$id', tgl_pengaduan='$tgl', nik='$nik', judul_laporan='$judul', isi_laporan='$isi', foto='$foto', status='$status' WHERE id_pengaduan='$id'";
        $query = mysqli_query($conn, $sql);
    
        return mysqli_affected_rows($conn);
    
    }

    //untuk insert data tanggapan
    function buatTanggapan($id){

        global $conn;

        $pengaduan = prosesUpdatePengaduan($id);
        $tgl = date("Y-m-d");
        $id_petugas = $_SESSION['id'];
        $tanggapan = $_POST['tanggapan'];
        $sql = "INSERT INTO tanggapan VALUES('', '$id', '$tgl', '$tanggapan', '$id_petugas')";
        $query = mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);

    }

    //list tanggapan untuk list_tanggapan.php
    function listTanggapan(){

        global $conn;

        $sql = "SELECT * FROM tanggapan JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan";
        $query = mysqli_query($conn, $sql);

        return $query;

    }

    //untuk menampilkan table tanggapan  list_tanggapan.php
    function getTanggapan($id){

        global $conn;
        $sql = "SELECT * FROM pengaduan INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan JOIN petugas ON petugas.id_petugas=tanggapan.id_petugas WHERE tanggapan.id_tanggapan='$id'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);

        return $row;

    }

    //untuk mengupdate pengduan dari 'proses' ke '0'
    function selesaiUpdatePengaduan($id){

        global $conn;
        $data = getPengaduan($id);
        $tgl = $data['tgl_pengaduan'];
        $nik = $data['nik'];
        $judul = $data['judul_laporan'];
        $isi = $data['isi_laporan'];
        $foto = $data['foto'];
        $status = "selesai";
    
        $sql = "UPDATE pengaduan SET id_pengaduan='$id', tgl_pengaduan='$tgl', nik='$nik', judul_laporan='$judul', isi_laporan='$isi', foto='$foto', status='$status' WHERE id_pengaduan='$id'";
        $query = mysqli_query($conn, $sql);
    
        return mysqli_affected_rows($conn);

    }

    //untuk mengupdate tanggapan dari buatTanggapan()
    function updateTanggapan($id){

        global $conn;

        $id_pengaduan = $_POST['id_pengaduan'];
        $update = selesaiUpdatePengaduan($id_pengaduan);
        $tgl = date("Y-m-d");
        $tanggapan = $_POST['tanggapan'];
        $id_petugas = $_SESSION['id'];

        $sql = "UPDATE tanggapan SET id_tanggapan='$id', id_pengaduan='$id_pengaduan', tgl_tanggapan='$tgl', tanggapan='$tanggapan', id_petugas='$id_petugas' WHERE id_tanggapan='$id'";
        $query = mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
        
    }


?>