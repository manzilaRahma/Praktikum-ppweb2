<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Nilai Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h3>Form Nilai Mahasiswa</h3>
    <hr>
<?php
    $ar_matkul =[
        "DDP"=>"Dasar-Dasar Pemrograman",
        "WEB1"=>"Pemrograman Web 1",
        "WEB2"=>"Pemrograman Web 2",
        "SB"=>"Statistika dan Probabilitas",
        "BD"=>"Basis Data",
        "AI"=>"Kecerdasan Buatan",
        "JK"=>"Jaringan Komputer",
        "UI/UX"=>"UI/UX",
    ]
?>
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="nama" name="nama" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label> 
    <div class="col-8">
      <select id="matkul" name="matkul" class="custom-select">
        <option value="">--Mata Kuliah--</option>
<?php
    foreach($ar_matkul as $kode=>$nama) {
        echo "<option value='$kode'>$nama</option>";
    }
?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_uts" class="col-4 col-form-label">Nilai UTS</label> 
    <div class="col-8">
      <input id="nilai_uts" name="nilai_uts" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_uas" class="col-4 col-form-label">Nilai UAS</label> 
    <div class="col-8">
      <input id="nilai_uas" name="nilai_uas" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_tugas" class="col-4 col-form-label">Nilai Tugas/Praktikum</label> 
    <div class="col-8">
      <input id="nilai_tugas" name="nilai_tugas" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<hr>
Hasil Input Data Nilai Mahasiswa:
<br>
<?php
// ngambil data form
    if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $matkul = $_POST['matkul'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];
    $nilai_tugas = $_POST['nilai_tugas'];
    $rata_rata = ($nilai_uts * 0.3)+($nilai_uas * 0.3)+($nilai_tugas * 0.4);
    $keterangan = keterangan ($rata_rata);
    $grade = grade ($rata_rata);

    // tampilan hasil web
    echo "Nama : $nama <br>";
    echo "Mata Kuliah : $matkul <br>";
    echo "Nilai UTS : $nilai_uts <br>";
    echo "Nilai UAS : $nilai_uas <br>";
    echo "Nilai Tugas : $nilai_tugas <br>";
    echo "Rata-Rata Nilai : $rata_rata <br>";
    echo "Keterangan : $keterangan <br>";
    echo "Grade : $grade <br>";

    }
    // menentukan keterangan lulus atau tidak
    function keterangan ($rata_rata){
        if ($rata_rata >= 80) {
            return "Lulus";
        }
        else {
            return "Tidak Lulus";
        }
    }

    //menentukan grade
    function grade ($rata_rata){
        if ($rata_rata >= 85 && $rata_rata <= 100) {
            return "A (sangat Baik)";
        }
        elseif ($rata_rata >= 60 && $rata_rata < 85) {
            return "B (Baik)";
        }
        elseif ($rata_rata >= 40 && $rata_rata < 59) {
            return "C (Cukup)";
        }
        elseif ($rata_rata >= 20 && $rata_rata < 39) {
            return "D (Kurang)";
        }
        elseif ($rata_rata >= 0 && $rata_rata < 19) {
            return "E (Sangat Kurang)";
        }
        else{
            return "Tidak Lulus";
        }
    }
?>
<br>


</body>
</html>