<?php
include "koneksi.php";

if (isset($_POST['save'])) {
    $barang = $_POST['barang'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO reyhan (barang) VALUES (?)");

    if (!$stmt) {
        echo "<script>alert('Prepare failed: " . mysqli_error($koneksi) . "');</script>";
        echo "<script>window.location = 'tambah_barang.php';</script>";
        exit;
    }

    mysqli_stmt_bind_param($stmt, 's', $barang);

    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo "<script>alert('Data Barang Berhasil Disimpan');</script>";
    } else {
        echo "<script>alert('Data Barang Gagal Disimpan: " . mysqli_stmt_error($stmt) . "');</script>";
    }

    mysqli_stmt_close($stmt);
    echo "<script>window.location = 'view_barang.php';</script>";
}
