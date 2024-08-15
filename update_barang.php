<?php
include "koneksi.php";

if (isset($_POST['edit'])) {
    $id_barang = $_POST['id_barang'];
    $barang = $_POST['barang'];

    $stmt = mysqli_prepare($koneksi, "UPDATE reyhan SET barang = ? WHERE id_barang = ?");

    if (!$stmt) {
        echo "<script>alert('Prepare failed: " . mysqli_error($koneksi) . "');</script>";
        echo "<script>window.location = 'view_barang.php';</script>";
        exit;
    }

    mysqli_stmt_bind_param($stmt, 'ss', $barang, $id_barang);

    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo "<script>alert('Data Barang Berhasil Diedit');</script>";
    } else {
        echo "<script>alert('Data Barang Gagal Diedit: " . mysqli_stmt_error($stmt) . "');</script>";
    }

    mysqli_stmt_close($stmt);
    echo "<script>window.location = 'view_barang.php';</script>";
}
