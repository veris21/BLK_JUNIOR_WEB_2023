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
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
    <h1><?= $title ?></h1>
    <hr>
    <p class="mb-3">Selamat Datang Di Sistem Management Peserta Pelatihan <?= $title ?></p>
    
    <a href="form.php" class="btn btn-success btn-sm mb-3">Tambah Data Peserta <i class="fa fa-plus"></i></a>

    <table class="table table-bordered table-hover table-striped" width="100%">
        <thead>
            <tr align="center">
                <th>No.</th>
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Jenis Pelatihan</th>
                <th>Nomor HP</th>
                <th>Email</th>
                <th>Status</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT * FROM daftar_siswa ORDER BY Id DESC";
            $eksekusi_kueri = mysqli_query($conn, $query);
            $nomor = 1;
            while ($peserta = mysqli_fetch_array($eksekusi_kueri)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $peserta['NamaSiswa']; ?></td>
                <td><?php echo $peserta['NIS']; ?></td>
                <td><?php echo $peserta['JenisKelamin']; ?></td>
                <td><?php echo $peserta['Alamat']; ?></td>
                <td><?php echo $peserta['JenisPelatihan']; ?></td>
                <td><?php echo $peserta['NomorHp']; ?></td>
                <td><?php echo $peserta['Email']; ?></td>
                <td><?php echo $peserta['Status']; ?></td>
                <td>
                    <a href="detail.php?id=<?php echo $peserta['Id'];?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="form.php?update=<?php echo $peserta['Id'];?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    <a onclick="return confirm('Apakah Anda Serius Ingin Menghapus Data ini ?')" href="proses.php?aksi=delete&id=<?php echo $peserta['Id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>