<?php

$db = new SQLite3('cms.sqlite');
if (!$db) {
    echo $db->lastErrorMsg();
    exit();
}

// Buat tabel produk
$query_buat_tabel_produk= 'CREATE TABLE IF NOT EXISTS produk(
    id_produk INTEGER PRIMARY KEY AUTOINCREMENT,
    nama_produk TEXT NOT NULL,
    harga_produk REAL NOT NULL,
    deskripsi TEXT
)';

$db->query($query_buat_tabel_produk);