<?php
require 'dbkoneksi.php';

// Ambil data dari form
$_id = (!empty($_POST['id']) && $_POST['id'] != '0') ? $_POST['id'] : null;
$_nama = $_POST['nama'];
$_gender = $_POST['gender'];
$_tmp_lahir = $_POST['tmp_lahir'];
$_tgl_lahir = $_POST['tgl_lahir'];
$_kategori = $_POST['kategori'];
$_telpon = $_POST['telpon'];
$_alamat = $_POST['alamat'];
$_unit_kerja_id = $_POST['unit_kerja_id'];

if (!empty($_id)) {
    // UPDATE
    $sql = "UPDATE paramedik SET 
                nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=? 
            WHERE id=?";
    $data = [$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja_id, $_id];
} else {
    // INSERT
    $sql = "INSERT INTO paramedik 
                (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $data = [$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja_id];
}

// Eksekusi query
$stmt = $dbh->prepare($sql);
$stmt->execute($data);

// Redirect kembali ke halaman data paramedik
header("Location: data_paramedik2.php");
exit;
?>
