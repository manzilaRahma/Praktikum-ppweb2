<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Belanja Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h3>Belanja Online</h3>
                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">Customer</label>
                        <input type="text" class="form-control" name="customer" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilih Produk</label><br>
                        <input type="radio" name="produk" value="TV" required> TV
                        <input type="radio" name="produk" value="KULKAS" required> Kulkas
                        <input type="radio" name="produk" value="MESIN CUCI" required> Mesin Cuci
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" required>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </form>
                <br>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $customer = $_POST['customer'];
                    $produk = $_POST['produk'];
                    $jumlah = $_POST['jumlah'];
                    
                    $harga_produk = [
                        "TV" => 4200000,
                        "KULKAS" => 3100000,
                        "MESIN CUCI" => 3800000
                    ];
                    
                    $total_harga = $harga_produk[$produk] * $jumlah;
                    echo "<p>Nama Customer: <strong>$customer</strong></p>";
                    echo "<p>Produk Pilihan: <strong>$produk</strong></p>";
                    echo "<p>Jumlah Beli: <strong>$jumlah</strong></p>";
                    echo "<p>Total Belanja: <strong>Rp. " . number_format($total_harga, 0, ',', '.') . "</strong></p>";
                }
                ?>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">Daftar Harga</div>
                    <div class="card-body">
                        <p>TV : 4.200.000</p>
                        <p>Kulkas : 3.100.000</p>
                        <p>MESIN CUCI : 3.800.000</p>
                    </div>
                    <div class="card-footer text-danger">Harga Dapat Berubah Setiap Saat</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
