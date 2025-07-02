<!DOCTYPE html>
<html>
<head>
    <title>Data Paramedik</title>
</head>
<body>
    <h1>Data Paramedik</h1>
    <table border="1">
        <tr>
            <th>ID</th><th>Nama</th><th>Gender</th><th>Tempat Lahir</th>
            <th>Tanggal Lahir</th><th>Kategori</th><th>Telepon</th><th>Alamat</th>
        </tr>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['tmp_lahir'] ?></td>
                <td><?= $row['tgl_lahir'] ?></td>
                <td><?= $row['kategori'] ?></td>
                <td><?= $row['telpon'] ?></td>
                <td><?= $row['alamat'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
