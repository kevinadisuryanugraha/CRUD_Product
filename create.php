<?php

require "db.php";

if (isset($_POST['submit'])) {
    $nama_produk = $_POST['namaProduk'];
    $harga_produk = $_POST['hargaProduk'];
    $deskripsi = $_POST['deskripsi'];
    
    // Tambah data baru hanya kalo nama_produk nggk kosong
    if (!empty($nama_produk) && !empty($harga_produk)) {
        $query_tambah_data = "INSERT INTO produk (nama_produk, harga_produk, deskripsi) VALUES ('$nama_produk', '$harga_produk', '$deskripsi')";
        if ($db->exec($query_tambah_data)) {
            header("Location: index.php");
        } else {
            echo "Eror tidak berhasil euyy";
        }
    } else {
        echo "harus diisi semua atuh kang";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Tambah Produk Baru</h2>
        <form action="" method="POST" class="product-form">
            <div class="form-group">
                <label for="namaProduk">Nama Produk</label>
                <input type="text" id="namaProduk" name="namaProduk" required>
            </div>
            <div class="form-group">
                <label for="hargaProduk">Harga Produk</label>
                <input type="number" id="hargaProduk" name="hargaProduk" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" name="submit" class="submit-btn">Simpan</button>
                <a href="index.php" class="cancel-btn">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>
