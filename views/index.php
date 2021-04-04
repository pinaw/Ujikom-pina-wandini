<?php require "../config/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <title>Index Page</title>
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Index Aplikasi Pengaduan Masyarakat
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Website Pengaduan Masyarakat</h5>
                        <p class="card-text text-center">Selamat datang di website pengaduan masyarakat</p>
                        <p class="card-text text-center">Silahkan login dengan memilih salah satu dibawah ini.</p>
                        <!-- 
                        -->
                        <div class="row justify-content-md-center">
                            <div class="col col-lg-3">
                                <a href="masyarakat-app" class="btn btn-primary">Masyarakat</a>
                            </div>
                            <div class="col-md-auto">
                                <a href="petugas-app" class="btn btn-primary">Petugas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>