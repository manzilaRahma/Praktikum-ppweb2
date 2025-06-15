<?php
require 'dbkoneksi.php';

// Ambil data dari form
$_id         = isset($_POST['id']) ? $_POST['id'] : null;
$_tanggal    = $_POST['tanggal'];
$_berat      = $_POST['berat'];
$_tinggi     = $_POST['tinggi'];
$_tensi      = $_POST['tensi'];
$_keterangan = $_POST['keterangan'];
$_pasien_id  = $_POST['pasien_id'];
$_dokter_id  = $_POST['dokter_id'];

if (!empty($_id)) {
    // UPDATE data
    $sql  = "UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=? WHERE id=?";
    $data = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id, $_id];
} else {
    // INSERT data baru
    $sql  = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $data = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id];
}

$stmt = $dbh->prepare($sql);
$stmt->execute($data);

// Redirect setelah simpan
header("Location: data_periksa.php");
exit;
?>
