<?php
require "db.php";

// Ambil ID dari parameter URL
$get_id = $_GET['id'];

// Pastikan ID ada
if (isset($get_id) && !empty($get_id)) {
    $query_hapus = "DELETE FROM produk WHERE id_produk='$get_id'";
    $hapus_data = $db->query($query_hapus);

    if ($hapus_data) {
        header('Location: index.php');
        exit(); 
    } else {
        echo "Hapus data gagal: " . $db->lastErrorMsg();
    }
} else {
    echo "ID tidak ditemukan.";
}
