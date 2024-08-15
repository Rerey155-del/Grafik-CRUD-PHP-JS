<!DOCTYPE html>
<html>

<head>
    <title>Form Tambah Penjualan</title>
</head>

<body>
    <form action="save_penjualan.php" method="post">
        <table align="center" width="500" border="1">
            <tr>
                <td colspan="2" align="center">
                    <h2>FORM TAMBAH Penjualan</h2>
                </td>
            </tr>

            <tr>
                <td>ID Penjualan</td>
                <td><input type="text" name="id_penjualan" id="id_penjualan" placeholder="ID Penjualan"></td>
            </tr>

            <tr>
                <td>ID Barang</td>
                <td>
                    <select name="id_barang" id="id_barang">
                        <?php
                        include "koneksi.php";

                        // Query to fetch barang data from database
                        $result = mysqli_query($koneksi, "SELECT id_barang, barang FROM reyhan");

                        if (!$result) {
                            die("Query failed: " . mysqli_error($koneksi));
                        }

                        // Loop through the fetched data to create options
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['id_barang']}'>{$row['id_barang']} - {$row['barang']}</option>";
                        }

                        mysqli_free_result($result);
                        mysqli_close($koneksi);
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Jumlah</td>
                <td><input type="text" name="jumlah" id="jumlah" placeholder="Jumlah"></td>
            </tr>

            <tr>
                <td>Tanggal Penjualan</td>
                <td><input type="date" name="tgl_penjualan" id="tgl_penjualan" placeholder="Tanggal Penjualan"></td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="save" value="SAVE"> | <input type="reset" name="reset" value="CLEAR">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>