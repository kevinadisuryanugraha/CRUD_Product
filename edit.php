<?php

require "db.php";

// Ambil parameter 'id' dari URL
$get_id = isset($_GET['id']) ? $_GET['id'] : 0;

function get_data_edit($id)
{
    global $db;
    $query_get_data_edit = "SELECT id_produk, nama_produk, harga_produk, deskripsi FROM produk WHERE id_produk='$id'";
    $ambil_data_edit = $db->query($query_get_data_edit);
    if ($ambil_data_edit) {
        return $ambil_data_edit->fetchArray(SQLITE3_ASSOC);
    } else {
        return false; // Jika query gagal, kembalikan false
    }
}

// Handle update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = $_POST['namaProduk'];
    $harga_produk = $_POST['hargaProduk'];
    $deskripsi = $_POST['deskripsi'];

    if (!empty($nama_produk) && !empty($harga_produk) && !empty($deskripsi)) {
        $query_update_data = "UPDATE produk SET nama_produk='$nama_produk', harga_produk='$harga_produk', deskripsi='$deskripsi' WHERE id_produk='$get_id'";
        if ($db->exec($query_update_data)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal memperbarui data!";
        }
    } else {
        echo "Semua field harus diisi!";
    }
}

$data_edit = get_data_edit($get_id);

// Cek apakah data ditemukan
if (!$data_edit) {
    echo "Data tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Edit Produk</h2>
        <form action="" method="POST" class="product-form">
            <div class="form-group">
                <label for="namaProduk">Nama Produk</label>
                <input type="text" id="namaProduk" name="namaProduk" value="<?php echo htmlspecialchars($data_edit['nama_produk']); ?>" required>
            </div>
            <div class="form-group">
                <label for="hargaProduk">Harga Produk</label>
                <input type="number" id="hargaProduk" name="hargaProduk" value="<?php echo htmlspecialchars($data_edit['harga_produk']); ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" required><?php echo htmlspecialchars($data_edit['deskripsi']); ?></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="submit-btn">Simpan</button>
                <a href="index.php" class="cancel-btn">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>













