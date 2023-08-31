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

$NamaSiswa = isset($_POST['NamaSiswa']) ? $_POST['NamaSiswa'] : 'Tidak Di input';
$NIS = isset($_POST['NIS']) ? $_POST['NIS'] : '000000000' ;
$JenisKelamin = isset($_POST['JenisKelamin']) ? $_POST['JenisKelamin'] : 'LAKI-LAKI';
$IdKelas = isset($_POST['IdKelas']) ? $_POST['IdKelas'] : 1;
$Alamat = isset($_POST['Alamat']) ? $_POST['Alamat'] : '';
$NomorHp = isset($_POST['NomorHp']) ? $_POST['NomorHp'] : '';
$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
$JenisPelatihan = isset($_POST['JenisPelatihan']) ? $_POST['JenisPelatihan'] : '';
$Status = isset($_POST['Status']) ? $_POST['Status'] : 'NONAKTIF';

if(isset($_GET['aksi'])){
    if($_GET['aksi']=='delete'){
        if(!isset($_GET['id'])){
            echo "Aksi Ada Tapi ID Tidak Ada";
            die;
        }
        $id = $_GET['id'];
        // Logic Untuk Melakukan Hapus data
        $sql = "DELETE FROM daftar_siswa WHERE Id=$id";
        $eksekusi_hapus = mysqli_query($conn, $sql);
        if($eksekusi_hapus){
            header("location:index.php");
        }else{
            echo "Gagal Melakukan Perintah Hapus data";
        }
    }else if($_GET['aksi']=='update'){
        echo "Sedang Melakukan Update Data :". $_GET['id'];
    }else{

    }
}else{
    echo "Aksi Tidak Di Ijinkan";
}

// echo $NamaSiswa .'<br>';
// echo $NIS.'<br>';
// echo $JenisKelamin.'<br>';
// echo $IdKelas.'<br>';
// echo $Alamat.'<br>';
// echo $NomorHp.'<br>';
// echo $Email.'<br>';
// echo $JenisPelatihan.'<br>';
// echo $Status.'<br>';

?>