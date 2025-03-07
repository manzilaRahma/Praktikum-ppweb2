<?php
    $ns1 = ["id" => 1, "nim" => "01101", "UTS" => 80, "UAS" => 84, "tugas" => 78];
    $ns2 = ["id" => 2, "nim" => "01121", "UTS" => 70, "UAS" => 50, "tugas" => 68];
    $ns3 = ["id" => 3, "nim" => "01131", "UTS" => 60, "UAS" => 86, "tugas" => 70];
    $ns4 = ["id" => 4, "nim" => "01141", "UTS" => 90, "UAS" => 91, "tugas" => 82];

    $ar_nilai = [$ns1, $ns2, $ns3, $ns4];

    echo $ar_nilai[0]["nim"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nilai Mahasiswa</title>
</head>
<body>
    <h3>Daftar Nilai Siswa</h3>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>No</th><th>NIM</th><th>UTS</th>
                <th>UAS</th><th>Tugas</th><th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nomor = 1;
                foreach ($ar_nilai as $nilai){
                    echo '<tr><td>'.$nomor.'</td>';
                    echo '<td>'.$nilai["nim"].'</td>';
                    echo '<td>'.$nilai["UTS"].'</td>';
                    echo '<td>'.$nilai["UAS"].'</td>';
                    echo '<td>'.$nilai["tugas"].'</td>';
                    $nilai_akhir = ($nilai['UTS'] + $nilai['UAS'] + $nilai['tugas']) / 3;
                    echo'<td>'.number_format($nilai_akhir,2,',','.').'</td>';
                    echo '</tr>';
                    $nomor++;
                }
            ?>
</body>
</html>