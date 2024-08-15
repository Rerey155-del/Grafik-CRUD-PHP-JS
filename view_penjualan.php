<?php
include "koneksi.php";

// Fetch data from hafiz and barang tables
$query = "SELECT maulana.id_penjualan, maulana.id_barang, maulana.jumlah, maulana.tgl_penjualan, reyhan.barang 
          FROM maulana 
          JOIN reyhan ON maulana.id_barang = reyhan.id_barang";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Penjualan</title>
</head>

<body>
    <h2 align="center">Daftar Penjualan</h2>
    <table border="1" align="center" width="800">
        <tr>
            <th>ID Penjualan</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Penjualan</th>
            <th>Aksi</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            // Format tanggal penjualan menjadi Tanggal Bulan Tahun
            $tanggal_penjualan = date('d F Y', strtotime($row['tgl_penjualan']));
            echo "<tr>";
            echo "<td>{$row['id_penjualan']}</td>";
            echo "<td>{$row['id_barang']}</td>";
            echo "<td>{$row['barang']}</td>";  // Displaying the name of the barang
            echo "<td>{$row['jumlah']}</td>";
            echo "<td>{$tanggal_penjualan}</td>";
            echo "<td>";
            echo "<a href='edit_penjualan.php?id={$row['id_penjualan']}'>Edit</a> | ";
            echo "<a href='delete_penjualan.php?id={$row['id_penjualan']}'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </table>
    <br>
    <div align="center">
        <a href="tambah_penjualan.php">Tambah Penjualan Baru</a>
    </div>
</body>

</html>