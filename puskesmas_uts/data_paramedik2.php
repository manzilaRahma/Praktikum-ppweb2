<?php
require 'dbkoneksi.php';
include_once 'header_puskesmas.php';
include_once 'sidebar_puskesmas.php';

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $dbh->prepare("DELETE FROM paramedik WHERE id=?");
    $stmt->execute([$id]);
    header("Location: data_paramedik2.php");
    exit;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Data Paramedik</h2>
            <a href="form_paramedik.php">
                <button class="btn btn-primary mb-3">Tambah Data</button>
            </a>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Tabel Paramedik</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Kategori</th>
                                <th>Telpon</th>
                                <th>Alamat</th>
                                <th>Unit Kerja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = "SELECT paramedik.*, unit_kerja.nama AS unit FROM paramedik 
                                    JOIN unit_kerja ON paramedik.unit_kerja_id = unit_kerja.id";
                            $rs = $dbh->query($sql);
                            foreach ($rs as $row) {
                                echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$row['nama']}</td>
                                    <td>{$row['gender']}</td>
                                    <td>{$row['tmp_lahir']}</td>
                                    <td>{$row['tgl_lahir']}</td>
                                    <td>{$row['kategori']}</td>
                                    <td>{$row['telpon']}</td>
                                    <td>{$row['alamat']}</td>
                                    <td>{$row['unit']}</td>
                                    <td>
                                        <a href='form_paramedik.php?id={$row['id']}' class='btn btn-warning btn-sm mb-1'>Edit</a>
                                        <a href='data_paramedik2.php?hapus={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                                    </td>
                                </tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
