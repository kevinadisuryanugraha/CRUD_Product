<?php

include 'db.php';

$query_tampilkan_produk = 'SELECT * FROM produk';
$result = $db->query($query_tampilkan_produk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="table-container">
        <a href="create.php" class="add-product-btn">Tambah Produk</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama_produk']}</td>
                            <td>{$row['harga_produk']}</td>
                            <td>{$row['deskripsi']}</td>
                            <td>
                                <a href='edit.php?id={$row['id_produk']}'>Edit</a>
                                <a href='delete.php?id={$row['id_produk']}' onclick=\"return confirm('Apakah Anda yakin ingin menghapus produk ini?');\">Hapus</a>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
