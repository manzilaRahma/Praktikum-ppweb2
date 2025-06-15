<?php
include 'dbkoneksi.php';

if (isset($_POST['proses'])) {
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kategori = $_POST['kategori'];
    $telpon = $_POST['telpon'];
    $alamat = $_POST['alamat'];
    $unit_kerja_id = $_POST['unit_kerja_id'];

    if ($_POST['proses'] == 'Ubah') {
        $id = $_POST['id'];
        $sql = "UPDATE paramedik SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=? WHERE id=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$nama, $gender, $tmp_lahir, $tgl_lahir, $kategori, $telpon, $alamat, $unit_kerja_id, $id]);
    } else {
        $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$nama, $gender, $tmp_lahir, $tgl_lahir, $kategori, $telpon, $alamat, $unit_kerja_id]);
    }

    header("Location: data_paramedik2.php");
    exit;
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $dbh->prepare("DELETE FROM paramedik WHERE id=?");
    $stmt->execute([$id]);
    header("Location: data_paramedik2.php");
    exit;
}
