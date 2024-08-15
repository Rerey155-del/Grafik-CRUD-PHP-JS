<?php
include "koneksi.php";

if (isset($_POST['save'])) {
    $id_penjualan = $_POST['id_penjualan'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    $tgl_penjualan = $_POST['tgl_penjualan'];

    // Check for duplicate entry
    $checkQuery = "SELECT COUNT(*) FROM maulana WHERE id_penjualan = ?";
    $stmtCheck = mysqli_prepare($koneksi, $checkQuery);
    mysqli_stmt_bind_param($stmtCheck, 's', $id_penjualan);
    mysqli_stmt_execute($stmtCheck);
    mysqli_stmt_bind_result($stmtCheck, $count);
    mysqli_stmt_fetch($stmtCheck);
    mysqli_stmt_close($stmtCheck);

    if ($count > 0) {
        echo "<script>alert('Data Penjualan dengan ID tersebut sudah ada');</script>";
        echo "<script>window.location = 'tambah_penjualan.php';</script>";
        exit;
    }

    $stmt = mysqli_prepare($koneksi, "INSERT INTO maulana (id_penjualan, id_barang, jumlah, tgl_penjualan) VALUES (?, ?, ?, ?)");

    if (!$stmt) {
        echo "<script>alert('Prepare failed: " . mysqli_error($koneksi) . "');</script>";
        echo "<script>window.location = 'tambah_penjualan.php';</script>";
        exit;
    }

    mysqli_stmt_bind_param($stmt, 'ssss', $id_penjualan, $id_barang, $jumlah, $tgl_penjualan);

    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo "<script>alert('Data Penjualan Berhasil Disimpan');</script>";
    } else {
        echo "<script>alert('Data Penjualan Gagal Disimpan: " . mysqli_stmt_error($stmt) . "');</script>";
    }

    mysqli_stmt_close($stmt);
    echo "<script>window.location = 'view_penjualan.php';</script>";
}
