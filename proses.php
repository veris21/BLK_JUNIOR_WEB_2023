<?php 
$servername = "localhost"; // Hostname Server Database
$username = "root"; // Username Dari Database (Sesuaikan Dengan Setting Masing - Masing)
$password = "root"; // Password Dari Database (Sesuaikan Dengan Setting Masing - Masing)
$database = "blki"; // Nama database (Sesuaikan Dengan Nama database Masing - Masing)
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// ================ [ Kumpulan Tangkapan Data/Dari Form.php ] ======================
$NamaSiswa = isset($_POST['NamaSiswa']) ? $_POST['NamaSiswa'] : 'Tidak Di input';
$NIS = isset($_POST['NIS']) ? $_POST['NIS'] : '000000000' ;
$JenisKelamin = isset($_POST['JenisKelamin']) ? $_POST['JenisKelamin'] : 'LAKI-LAKI';
$IdKelas = isset($_POST['IdKelas']) ? $_POST['IdKelas'] : 1;
$Alamat = isset($_POST['Alamat']) ? $_POST['Alamat'] : '';
$NomorHp = isset($_POST['NomorHp']) ? $_POST['NomorHp'] : '';
$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
$JenisPelatihan = isset($_POST['JenisPelatihan']) ? $_POST['JenisPelatihan'] : '';
$Status = isset($_POST['Status']) ? $_POST['Status'] : 'NONAKTIF';
// ================ [ Kumpulan Tangkapan Data/Dari Form.php ] ======================
if(isset($_GET['aksi'])){ // TRUE atau FALSE
    if($_GET['aksi']=='delete'){
        if(!isset($_GET['id'])){
            echo "Aksi Ada Tapi ID Tidak Ada";
            die;
        }
        $id = $_GET['id'];
        // Logic Untuk Melakukan Hapus data
        $sql = "DELETE FROM daftar_siswa WHERE Id=$id";
        $eksekusi_hapus = mysqli_query($conn, $sql);
        mysqli_close($conn);
        if($eksekusi_hapus){
            header("location:index.php");
        }else{
            echo "Gagal Melakukan Perintah Hapus data";
        }
    }else if($_GET['aksi']=='update'){
        $id = $_GET['id'];
        echo "Sedang Melakukan Update Data :". $_GET['id'];
        // Fungsi Update Data
        $sql_update = "UPDATE daftar_siswa SET `NamaSiswa`='$NamaSiswa', `NIS` = '$NIS', `JenisKelamin` = '$JenisKelamin', `IdKelas`='$IdKelas', `Alamat`= '$Alamat', `NomorHp`='$NomorHp', `Email`='$Email', `JenisPelatihan`='$JenisPelatihan', `Status` = '$Status' WHERE Id = $id;";
        // Fungsi Simpan /Insert Data Ke Database
        $eksekusi_update = mysqli_query($conn, $sql_update);
        mysqli_close($conn);
        if($eksekusi_update){
            header("location:index.php");
        }else{
            
            echo "Gagal Melakukan Perintah Update data";
            echo "<hr>";
            echo "<pre>";
            echo $sql_update;
            echo "</pre>";
        }
    }else{
        $sql_insert = "INSERT INTO daftar_siswa(`NamaSiswa`, `NIS`, `JenisKelamin`, `IdKelas`, `Alamat`, `NomorHp`, `Email`, `JenisPelatihan`, `Status`) 
        VALUES('$NamaSiswa', '$NIS','$JenisKelamin', '$IdKelas', '$Alamat', '$NomorHp', '$Email', '$JenisPelatihan', '$Status');";
        // Fungsi Simpan /Insert Data Ke Database
        $eksekusi_simpan = mysqli_query($conn, $sql_insert);
        mysqli_close($conn);
        if($eksekusi_simpan){
            header("location:index.php");
        }else{
            
            echo "Gagal Melakukan Perintah Simpan data";
            echo "<hr>";
            echo "<pre>";
            echo $sql_insert;
            echo "</pre>";
        }
    }
}else{
    echo "Aksi Tidak Di Ijinkan";
    header("location: index.php");
}

?>