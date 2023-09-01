<?php require 'header.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location: index.php");
    }
    $query = "select * from daftar_siswa where Id = $id";
    $eksekusi_kueri = mysqli_query($conn, $query);
    mysqli_close($conn);
    while ($peserta = mysqli_fetch_array($eksekusi_kueri)) {?>
    <h1 class="mb-3 text-center">Details Data Peserta </h1>
    <div class="card">
        <div class="card-body">
        <!-- Konten Details Siswa -->
        <div class="row"></div>
        <div class="col-sm-6">
            <img alt="" width="100%" class="rounded mx-auto d-block" src="<?php echo $peserta['Foto']; ?>" />
        </div>
        <div class="col-sm-6">
            <div class="table-responsive">
            <table class="table table-stripped" width="100%">
                <tr>
                    <td width="35%">Nama</td>
                    <td width="3%">:</td>
                    <td><?php echo $peserta['NamaSiswa']; ?></td>
                </tr>
                <tr>
                    <td width="35%">NIS</td>
                    <td width="3%">:</td>
                    <td> <?php echo $peserta['NIS']; ?></td>
                </tr>
                <tr>
                    <td width="35%">Jenis Kelamin</td>
                    <td width="3%">:</td>
                    <td> <?php echo $peserta['JenisKelamin']; ?></td>
                </tr>
                <tr>
                    <td width="35%">Nomor HP</td>
                    <td width="3%">:</td>
                    <td> <?php echo $peserta['NomorHp']; ?></td>
                </tr>
                <tr>
                    <td width="35%">Email</td>
                    <td width="3%">:</td>
                    <td> <?php echo $peserta['Email']; ?></td>
                </tr>
                <tr>
                    <td width="35%">Alamat</td>
                    <td width="3%">:</td>
                    <td> <?php echo $peserta['Alamat']; ?></td>
                </tr>
                
                <tr>
                    <td width="35%">Jenis Pelatihan</td>
                    <td width="3%">:</td>
                    <td> <?php echo $peserta['JenisPelatihan']; ?></td>
                </tr>
                <tr>
                    <td width="35%">Status Siswa</td>
                    <td width="3%">:</td>
                    <td> <?php echo $peserta['Status']; ?></td>
                </tr>
            </table>
            </div>
        </div>
        <!-- End Konten Siswa -->
        </div>
        <div class="card-footer">
        <a href="index.php" class="btn btn-outline-dark"><i class="fa fa-arrow-left"></i> Kembali Ke Data Peserta </a>
        </div>
    </div>
<?php } ?>
<?php require 'footer.php'; ?>