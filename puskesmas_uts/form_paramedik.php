<?php
require 'dbkoneksi.php';
include_once 'header_puskesmas.php';
include_once 'sidebar_puskesmas.php';

$edit = false;
$row = [];
if (isset($_GET['id'])) {
    $edit = true;
    $stmt = $dbh->prepare("SELECT * FROM paramedik WHERE id=?");
    $stmt->execute([$_GET['id']]);
    $row = $stmt->fetch();
}

$unitkerja = $dbh->query("SELECT * FROM unit_kerja");
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h2 class="text-center"><?= $edit ? 'Edit' : 'Tambah' ?> Paramedik</h2>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form Paramedik</h3>
                </div>
                <form method="POST" action="proses_paramedik.php">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?= $edit ? $row['id'] : '' ?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $edit ? $row['nama'] : '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" value="L" class="form-check-input" <?= ($edit && $row['gender'] == 'L') ? 'checked' : '' ?>>
                                <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" value="P" class="form-check-input" <?= ($edit && $row['gender'] == 'P') ? 'checked' : '' ?>>
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tmp_lahir" class="form-control" value="<?= $edit ? $row['tmp_lahir'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="<?= $edit ? $row['tgl_lahir'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control">
                                <option value="Dokter" <?= ($edit && $row['kategori'] == 'Dokter') ? 'selected' : '' ?>>Dokter</option>
                                <option value="Perawat" <?= ($edit && $row['kategori'] == 'Perawat') ? 'selected' : '' ?>>Perawat</option>
                                <option value="Bidan" <?= ($edit && $row['kategori'] == 'Bidan') ? 'selected' : '' ?>>Bidan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Telpon</label>
                            <input type="text" name="telpon" class="form-control" value="<?= $edit ? $row['telpon'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control"><?= $edit ? $row['alamat'] : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Unit Kerja</label>
                            <select name="unit_kerja_id" class="form-control">
                                <?php foreach ($unitkerja as $uk): ?>
                                    <option value="<?= $uk['id'] ?>" <?= ($edit && $row['unit_kerja_id'] == $uk['id']) ? 'selected' : '' ?>>
                                        <?= $uk['nama'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="proses" value="<?= $edit ? 'Ubah' : 'Simpan' ?>" class="btn btn-primary">Simpan</button>
                        <a href="proses_paramedik.php" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
