<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_penjualan = $_GET['id'];

    $stmt = mysqli_prepare($koneksi, "DELETE FROM maulana WHERE id_penjualan = ?");

    if (!$stmt) {
        echo "<script>alert('Prepare failed: " . mysqli_error($koneksi) . "');</script>";
        echo "<script>window.location = 'view_penjualan.php';</script>";
        exit;
    }

    mysqli_stmt_bind_param($stmt, 's', $id_penjualan);

    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo "<script>alert('Data Penjualan Berhasil Dihapus');</script>";
    } else {
        echo "<script>alert('Data Penjualan Gagal Dihapus: " . mysqli_stmt_error($stmt) . "');</script>";
    }

    mysqli_stmt_close($stmt);
    echo "<script>window.location = 'view_penjualan.php';</script>";
}
