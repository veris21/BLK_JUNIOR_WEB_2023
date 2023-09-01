<?php require 'header.php'; ?>
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
    
<?php require 'footer.php'; ?>