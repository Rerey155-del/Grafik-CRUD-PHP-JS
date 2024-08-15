<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_penjualan = $_GET['id'];

    // Prepare statement to prevent SQL injection
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM maulana WHERE id_penjualan = ?");
    mysqli_stmt_bind_param($stmt, 's', $id_penjualan);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Penjualan</title>
</head>

<body>
    <form action="update_penjualan.php" method="post">
        <input type="hidden" name="id_penjualan" value="<?php echo htmlspecialchars($row['id_penjualan']); ?>">
        <table align="center" width="500" border="1">
            <tr>
                <td colspan="2" align="center">
                    <h2>FORM EDIT Penjualan</h2>
                </td>
            </tr>

            <tr>
                <td>ID Barang</td>
                <td>
                    <select name="id_barang" id="id_barang">
                        <?php
                        // Query to fetch barang data from database
                        $barang_result = mysqli_query($koneksi, "SELECT id_barang, barang FROM reyhan");

                        if (!$barang_result) {
                            die("Query failed: " . mysqli_error($koneksi));
                        }

                        // Loop through the fetched data to create options
                        while ($barang_row = mysqli_fetch_assoc($barang_result)) {
                            $selected = ($barang_row['id_barang'] == $row['id_barang']) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($barang_row['id_barang']) . "' $selected>" . htmlspecialchars($barang_row['id_barang']) . " - " . htmlspecialchars($barang_row['barang']) . "</option>";
                        }

                        mysqli_free_result($barang_result);
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Jumlah</td>
                <td><input type="text" name="jumlah" id="jumlah" value="<?php echo htmlspecialchars($row['jumlah']); ?>" placeholder="Jumlah"></td>
            </tr>

            <tr>
                <td>Tanggal Penjualan</td>
                <td><input type="date" name="tgl_penjualan" id="tgl_penjualan" value="<?php echo htmlspecialchars($row['tgl_penjualan']); ?>" placeholder="Tanggal Penjualan"></td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="edit" value="EDIT">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>