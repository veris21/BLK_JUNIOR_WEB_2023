<?php include 'header.php' ?>

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
                    Formulir Data Siswa <?= $title ?>
                </h3>
            </div>
            <div class="card-body">
                <form action="proses.php<?php echo $action ?>" method="post" enctype="multipart/form-data">
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
                    <!-- Ini Adalah Input File -->
                    <div class="form-group mb-3">
                        <label for="">Foto Siswa</label>
                        <input type="file" name="foto" id="foto" accept="image/*" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group mb-3">
                        <label for="">Status</label>
                        <select name="Status" id="Status" class="form-control">
                            <option value="AKTIF" <?php echo $Status== 'AKTIF' ? 'selected' : '' ?>>AKTIF</option>
                            <option value="NONAKTIF" <?php echo $Status== 'NONAKTIF' ? 'selected' : '' ?>>NONAKTIF</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-outline-dark"><i class="fa fa-arrow-left"></i> Kembali Ke Data Peserta </a>
                        <button type="submit" class="btn btn-primary">Simpan Data <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    
   <?php require 'footer.php'; ?>