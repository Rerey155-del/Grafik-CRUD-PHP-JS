<?php
include "koneksi.php";

// Fetch data from barang table
$result = mysqli_query($koneksi, "SELECT * FROM reyhan");

if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Barang</title>
</head>

<body>
    <h2 align="center">Daftar Barang</h2>
    <table border="1" align="center" width="800">
        <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Aksi</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id_barang']}</td>";
            echo "<td>{$row['barang']}</td>";
            echo "<td>";
            echo "<a href='edit_barang.php?id={$row['id_barang']}'>Edit</a> | ";
            echo "<a href='delete_barang.php?id={$row['id_barang']}'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </table>
    <br>
    <div align="center">
        <a href="tambah_barang.php">Tambah Barang Baru</a>
    </div>
</body>

</html>