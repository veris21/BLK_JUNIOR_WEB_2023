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
        <h1 class="mb-3 text-center">Formulir Data Siswa <?= $title ?></h1>
        <a href="index.php" class="btn btn-outline-dark"><i class="fa fa-arrow-left"></i> Kembali Ke Daftar Peserta </a>
    <?php 
        $NamaSiswa = "";
        $JenisKelamin = "";
        $NIS = "";
        $Alamat = "";
        $NomorHp = "";
        $Email = "";
        $JenisPelatihan = "";
        $IdKelas = "";
        $Status = "";
        if(isset($_GET['update'])){
            $id = $_GET['update'];
            $message=  "Formulir Update Data : ID - ".$id;
            $action = "?aksi=update&id=$id";
            $query = "select * from daftar_siswa where Id = $id";
            $eksekusi_kueri = mysqli_query($conn, $query);
            mysqli_close($conn);
            while ($peserta = mysqli_fetch_array($eksekusi_kueri)) {
                $NamaSiswa = $peserta['NamaSiswa'];
                $JenisKelamin = $peserta['JenisKelamin'];
                $NIS = $peserta['NIS'];
                $Alamat = $peserta['Alamat'];
                $NomorHp = $peserta['NomorHp'];
                $Email = $peserta['Email'];
                $JenisPelatihan = $peserta['JenisPelatihan'];
                $IdKelas = $peserta['IdKelas'];
                $Status = $peserta['Status'];
            } 
        }else{
            $message = "Formulir Tambah Data";
            $action = "?aksi=create";
        }
    ?>
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <h3 class="card-title">
                    <?= $message  ?>
                </h3>
            </div>
            <div class="card-body">
                <form action="proses.php<?php echo $action ?>" method="post" >
                    <div class="form-group mb-3">
                        <label for="">Nama Siswa</label>
                        <input type="text" name="NamaSiswa" id="NamaSiswa" class="form-control" value="<?php echo $NamaSiswa; ?>" placeholder="Input Nama Lengkap">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">NIS</label>
                        <input type="number" name="NIS" id="NIS" class="form-control"  value="<?php echo $NIS; ?>" placeholder="Nomor Induk Siswa">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelas</label>
                        <select name="IdKelas" id="IdKelas" class="form-control">
                            <option value="1" <?php echo $IdKelas== 1 ? 'selected' : '' ?>>KELAS JUNIOR LEVEL I</option>
                            <option value="2" <?php echo $IdKelas== 2 ? 'selected' : '' ?>>KELAS JUNIOR LEVEL II</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Jenis Kelamin</label>
                        <select name="JenisKelamin" id="JenisKelamin" class="form-control">
                            <option value="LAKI-LAKI"  <?php echo $JenisKelamin== 'LAKI-LAKI' ? 'selected' : '' ?>>LAKI-LAKI</option>
                            <option value="PEREMPUAN"  <?php echo $JenisKelamin== 'PEREMPUAN' ? 'selected' : '' ?>>PEREMPUAN</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="">Alamat</label>
                        <textarea name="Alamat" id="Alamat" cols="30" rows="3" class="form-control" ><?php echo $Alamat; ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Nomor HP</label>
                        <input type="text" name="NomorHp" id="NomorHp" class="form-control" value="<?php echo $NomorHp ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" name="Email" id="Email" class="form-control" value="<?php echo $Email ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Jenis Pelatihan</label>
                        <input type="text" name="JenisPelatihan" id="JenisPelatihan" class="form-control" value="<?php echo $JenisPelatihan ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Status</label>
                        <select name="Status" id="Status" class="form-control">
                            <option value="AKTIF" <?php echo $Status== 'AKTIF' ? 'selected' : '' ?>>AKTIF</option>
                            <option value="NONAKTIF" <?php echo $Status== 'NONAKTIF' ? 'selected' : '' ?>>NONAKTIF</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data <i class="fa fa-save"></i></button>
                </form>
            </div>
        </div>
    
    </div>
</body>
</html>