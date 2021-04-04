<?php require "koneksi.php"; ?>
<?php @session_start(); ?>

<?php 

if (isset($_GET['logout'])) {
    $logout = $_GET['logout'];

    if ($logout == "masyarakat") {
        if (logout() > 0) {
            @header("location: ../views/masyarakat-app/login.php?pesan=logout");
        }
    }

    if ($logout == "petugas") {
        if (logout() > 0) {
            @header("location: ../views/petugas-app/login.php?pesan=logout");
        }
    }
}

function registerMasyarakat(){

    global $conn;

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telpon = $_POST['telpon'];
    $status = "tidak";

    $sql = "INSERT INTO masyarakat VALUES('$nik', '$nama', '$username', '$password', '$telpon', '$status')";
    $query = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);

}

function loginMasyarakat(){

    global $conn;

    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM masyarakat WHERE nik = $nik";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    if ($username == $row['username'] AND $password == $row['password']) {
        @session_start();
        $_SESSION['nik'] = $row['nik'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = $row['status'];
    }
    else{
    header("Location: login.php?pesan=password_salah");
    exit;
    }

    return mysqli_affected_rows($conn);

}

function loginPetugas(){

    global $conn;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE username='$username'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    if ($username == $row['username'] AND $password == $row['password']) {
        @session_start();
        $_SESSION['id'] = $row['id_petugas'];
        $_SESSION['nama'] = $row['nama_petugas'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];
    }
    else{
    header("Location: login.php?pesan=password_salah");
    exit;
    }

    return mysqli_affected_rows($conn);

}

function Logout(){

    session_start();
    session_destroy();

    return true;
    
}



?>