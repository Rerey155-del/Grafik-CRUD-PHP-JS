<?php
include "koneksi.php";

if (isset($_POST['edit'])) {
    $id_penjualan = $_POST['id_penjualan'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    $tgl_penjualan = $_POST['tgl_penjualan'];

    // Prepare the update statement
    $stmt = mysqli_prepare($koneksi, "UPDATE maulana SET id_barang = ?, jumlah = ?, tgl_penjualan = ? WHERE id_penjualan = ?");

    if (!$stmt) {
        echo "<script>alert('Prepare failed: " . mysqli_error($koneksi) . "');</script>";
        echo "<script>window.location = 'view_penjualan.php';</script>";
        exit;
    }

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, 'ssss', $id_barang, $jumlah, $tgl_penjualan, $id_penjualan);

    // Execute the statement
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo "<script>alert('Data Penjualan Berhasil Diedit');</script>";
    } else {
        echo "<script>alert('Data Penjualan Gagal Diedit: " . mysqli_stmt_error($stmt) . "');</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Redirect to view_penjualan.php
    echo "<script>window.location = 'view_penjualan.php';</script>";
}
