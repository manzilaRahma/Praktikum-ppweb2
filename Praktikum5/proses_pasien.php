<?php
// memanggil file koneksi database
require 'dbkoneksi_asdos.php';

$_kode = $_POST['kode'];
$_nama = $_POST['nama'];
$_tmp_lahir = $_POST['tmp_lahir'];
$_tgl_lahir = $_POST['tgl_lahir'];
$_gender = $_POST['gender'];
$_email = $_POST['email'];
$_alamat = $_POST['alamat'];
$_kelurahan_id = $_POST['kelurahan_id'];

$data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan_id];

$sql = "INSERT INTO pasien(kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES(?,?,?,?,?,?,?,?)";

$stmt = $dbh->prepare($sql);

$stmt->execute($data);

header("Location: pasien.php");
?>