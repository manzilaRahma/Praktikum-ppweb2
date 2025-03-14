<?php
    require_once 'class_mahasiswa.php';

    $hasil = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $matkul = $_POST['matkul'];
        $nilai = $_POST['nilai'];

        $mahasiswa = new Mahasiswa($nama, $nim, $matkul, $nilai);
        $hasil ="<div>
                <strong>NIM :</strong> {$mahasiswa->nim} <br>
                <strong>Nama Mata Kuliah :</strong> {$mahasiswa->matkul} <br>
                <strong>Nilai :</strong> {$mahasiswa->nilai} <br>
                <strong>Hasil Ujian :</strong> {$mahasiswa->grade()} <br>
                <strong>Grade :</strong> {$mahasiswa->kelulusan()} 
              </div>";
                
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
 
</head>
<body>
<div class="container mt-5">
        <h2>Form Nilai Ujian</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nim" class="form-label">nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="matkul" class="form-label">Pilih MK</label>
                <select class="form-select" id="matkul" name="matkul" required>
                    <option value="Data Warehouse">Dasar Dasar Pemrograman</option>
                    <option value="Pemrograman Web">Pemrograman Web</option>
                    <option value="Basis Data">Basis Data</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="number" class="form-control" id="nilai" name="nilai" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>

     </div>
     <div>
        <?php echo $hasil; ?>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>