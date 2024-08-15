<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];

    $stmt = mysqli_prepare($koneksi, "DELETE FROM reyhan WHERE id_barang = ?");

    if (!$stmt) {
        echo "<script>alert('Prepare failed: " . mysqli_error($koneksi) . "');</script>";
        echo "<script>window.location = 'view_barang.php';</script>";
        exit;
    }

    mysqli_stmt_bind_param($stmt, 's', $id_barang);

    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo "<script>alert('Data Barang Berhasil Dihapus');</script>";
    } else {
        echo "<script>alert('Data Barang Gagal Dihapus: " . mysqli_stmt_error($stmt) . "');</script>";
    }

    mysqli_stmt_close($stmt);
    echo "<script>window.location = 'view_barang.php';</script>";
}
?>
