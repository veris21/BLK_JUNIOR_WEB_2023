<?php 
require 'koneksi.php';
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
        if($_FILES['foto']){
            $ekstensi_diperbolehkan	= array('png','jpg');
            $nama = $_FILES['foto']['name'];
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran	= $_FILES['foto']['size'];
            $file_tmp = $_FILES['foto']['tmp_name'];	
            $new_name = date("Y-m-dHis").'.'.$ekstensi;
            if($ukuran < 1044070){ // dalam Byte 1044070 = 10
                // Fungsi Update Data
                move_uploaded_file($file_tmp, 'upload/'.$new_name);
                $sql_update = "UPDATE daftar_siswa SET `NamaSiswa`='$NamaSiswa', `NIS` = '$NIS', `JenisKelamin` = '$JenisKelamin', `IdKelas`='$IdKelas', `Alamat`= '$Alamat', `NomorHp`='$NomorHp', `Email`='$Email', `JenisPelatihan`='$JenisPelatihan', `Status` = '$Status', `foto`= 'upload/$new_name' WHERE Id = $id;";
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
            }
        }else{
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
        }
        
    }else{
        if($_FILES['foto']){
            $ekstensi_diperbolehkan	= array('png','jpg');
            $nama = $_FILES['foto']['name'];
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran	= $_FILES['foto']['size'];
            $file_tmp = $_FILES['foto']['tmp_name'];	
            $new_name = date("Y-m-dHis").'.'.$ekstensi;
            if($ukuran < 1044070){ // dalam Byte 1044070 = 10MB
                move_uploaded_file($file_tmp, 'upload/'.$new_name);
                 $sql_insert = "INSERT INTO daftar_siswa(`NamaSiswa`, `NIS`, `JenisKelamin`, `IdKelas`, `Alamat`, `NomorHp`, `Email`, `JenisPelatihan`, `Status`, `foto`) 
                    VALUES('$NamaSiswa', '$NIS','$JenisKelamin', '$IdKelas', '$Alamat', '$NomorHp', '$Email', '$JenisPelatihan', '$Status', 'upload/$new_name');";
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
            // echo "Ada Foto Terkirim Dari Form";
            // echo "<br>";
            // echo $file_tmp;
            // echo "<br>";
            // echo $nama;
        }
       
    }
}else{
    echo "Aksi Tidak Di Ijinkan";
    header("location: index.php");
}

?>