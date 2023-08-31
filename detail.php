<?php
$title = "Balai Latihan Kerja Industri Prov. Bangka Belitung";
$servername = "localhost"; // Hostname Server Database
$username = "root"; // Username Dari Database (Sesuaikan Dengan Setting Masing - Masing)
$password = "root"; // Password Dari Database (Sesuaikan Dengan Setting Masing - Masing)
$database = "blki"; // Nama database (Sesuaikan Dengan Nama database Masing - Masing)
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    $status_koneksi =  "FAILED";
}
$status_koneksi =  "SUCCESS";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h1 class="mb-3 text-center">Details Data Peserta </h1>
        <a href="index.php" class="btn btn-outline-dark"><i class="fa fa-arrow-left"></i> Kembali Ke Daftar Peserta </a>
        <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }else{
            header("location: index.php");
        }
    ?>
    <?php 
    $query = "select * from daftar_siswa where Id = $id";
    $eksekusi_kueri = mysqli_query($conn, $query);
    mysqli_close($conn);
    while ($peserta = mysqli_fetch_array($eksekusi_kueri)) {?>
    <h4>Nama  : <?php echo $peserta['NamaSiswa']; ?></h4>
    <h4>NIS  : <?php echo $peserta['NIS']; ?></h4>
    <h4>Jenis Pelatihan  : <?php echo $peserta['JenisPelatihan']; ?></h4>
    <?php } ?>
    </div>
</body>
</html>