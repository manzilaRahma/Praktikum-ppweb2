<?php
require 'dbkoneksi.php';
include_once 'header_puskesmas.php';
include_once 'sidebar_puskesmas.php';

$tanggal = '';
$berat = '';
$tinggi = '';
$tensi = '';
$keterangan = '';
$pasien_id = '';
$dokter_id = '';

// Ambil data pasien dan dokter untuk dropdown
$pasienList = $dbh->query("SELECT id, nama FROM pasien");
$dokterList = $dbh->query("SELECT id, nama FROM paramedik WHERE kategori = 'Dokter'");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Form Pemeriksaan</title>
</head>

<body>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Form Pemeriksaan</h2>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Input Data Pemeriksaan</h3>
                </div>

                <form action="proses_periksa.php" method="POST">
                    <div class="card-body">
                        <!-- Tanggal -->
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $tanggal ?>">
                        </div>

                        <!-- Berat Badan -->
                        <div class="form-group">
                            <label for="berat">Berat Badan (kg)</label>
                            <input type="number" step="0.1" class="form-control" id="berat" name="berat" value="<?= $berat ?>">
                        </div>

                        <!-- Tinggi Badan -->
                        <div class="form-group">
                            <label for="tinggi">Tinggi Badan (cm)</label>
                            <input type="number" step="0.1" class="form-control" id="tinggi" name="tinggi" value="<?= $tinggi ?>">
                        </div>

                        <!-- Tekanan Darah -->
                        <div class="form-group">
                            <label for="tensi">Tensi (mmHg)</label>
                            <input type="text" class="form-control" id="tensi" name="tensi" value="<?= $tensi ?>">
                        </div>

                        <!-- Keterangan -->
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan"><?= $keterangan ?></textarea>
                        </div>

                        <!-- Pasien -->
                        <div class="form-group">
                            <label for="pasien_id">Pasien</label>
                            <select class="form-control" id="pasien_id" name="pasien_id">
                                <?php foreach ($pasienList as $pasien): ?>
                                    <option value="<?= $pasien['id'] ?>"><?= $pasien['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Dokter -->
                        <div class="form-group">
                            <label for="dokter_id">Dokter</label>
                            <select class="form-control" id="dokter_id" name="dokter_id">
                                <?php foreach ($dokterList as $dokter): ?>
                                    <option value="<?= $dokter['id'] ?>"><?= $dokter['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
