<?php
require 'dbkoneksi.php';
include_once 'header_puskesmas.php';
include_once 'sidebar_puskesmas.php';

$edit = false;
$id = '';
$kode = '';
$nama = '';
$tmp_lahir = '';
$tgl_lahir = '';
$gender = '';
$email = '';
$alamat = '';
$kelurahan_id = '';

// Jika ada parameter ID dari URL (mode edit)
if (isset($_GET['id'])) {
    $edit = true;
    $id = $_GET['id'];

    $sql = "SELECT * FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    // Isi variabel dengan data pasien
    if ($row) {
        $kode = $row['kode'];
        $nama = $row['nama'];
        $tmp_lahir = $row['tmp_lahir'];
        $tgl_lahir = $row['tgl_lahir'];
        $gender = $row['gender'];
        $email = $row['email'];
        $alamat = $row['alamat'];
        $kelurahan_id = $row['kelurahan_id'];
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Form Pasien</title>
</head>

<body>
    <?php
    include 'dbkoneksi.php';
    $sql = "SELECT id, nama FROM kelurahan";
    $rs = $dbh->query($sql);
    ?>

    <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
            <h2 class="text-center">Form Pasien</h2>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form Pasien</h3>
                    </div>

                    <!-- Form start -->
                    <form action="proses_pasien.php" method="POST">
                        <div class="card-body">
                            <!-- Kode -->
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode ?>">
                            </div>

                            <!-- Nama -->
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>">
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="form-group">
                                <label for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= $tmp_lahir ?>">
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $tgl_lahir ?>">
                            </div>

                            <!-- Gender -->
                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderL" value="L" <?= ($gender == 'L') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="genderL">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderP" value="P" <?= ($gender == 'P') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="genderP">Perempuan</label>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
                            </div>

                            <!-- Alamat -->
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat"><?= $alamat ?></textarea>
                            </div>

                            <!-- Kelurahan -->
                            <div class="form-group">
                                <label for="kelurahan_id">Kelurahan</label>
                                <select class="form-control" id="kelurahan_id" name="kelurahan_id">
                                    <?php foreach ($rs as $row): ?>
                                        <option value="<?= $row['id'] ?>" <?= ($row['id'] == $kelurahan_id) ? 'selected' : '' ?>>
                                            <?= $row['nama'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Hidden ID (edit mode) -->
                            <?php if ($edit): ?>
                                <input type="hidden" name="id" value="<?= $id ?>">
                            <?php endif; ?>
                        </div>

                        <!-- Submit Button -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- Form end -->
                </div>
            </div>
        </section>
    </div>


    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
