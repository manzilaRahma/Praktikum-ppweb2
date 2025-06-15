<?php
require 'dbkoneksi.php';
include_once 'header_puskesmas.php';
include_once 'sidebar_puskesmas.php';

// Logika untuk hapus data
if (isset($_GET['proses']) && $_GET['proses'] == 'Hapus') {
    $id = $_GET['idx'];
    $sql = "DELETE FROM pasien WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    header("Location: data_pasien.php");
    exit;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Data Pasien</h2>
            <a href="form_pasien.php">
                <button class="btn btn-primary mb-3">Tambah Data</button>
            </a>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Tabel Pasien</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Kelurahan ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = $dbh->query('SELECT * FROM pasien');
                            foreach ($query as $row) {
                                echo '<tr>';
                                echo '<td>' . $no++ . '</td>';
                                echo '<td>' . $row['kode'] . '</td>';
                                echo '<td>' . $row['nama'] . '</td>';
                                echo '<td>' . $row['tmp_lahir'] . '</td>';
                                echo '<td>' . $row['tgl_lahir'] . '</td>';
                                echo '<td>' . $row['gender'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['alamat'] . '</td>';
                                echo '<td>' . $row['kelurahan_id'] . '</td>';
                                echo '<td>
                                    <div class="d-flex flex-column">
                                    <a href="form_pasien.php?id=' . $row['id'] . '" class="btn btn-sm btn-warning mb-2">Ubah</a>
                                    <a href="data_pasien.php?idx=' . $row['id'] . '&proses=Hapus" 
                                        class="btn btn-sm btn-danger" 
                                        onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Hapus</a>
                                    </div>
                                </td>';    
                                echo '</tr>';
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JS Bootstrap dan jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
