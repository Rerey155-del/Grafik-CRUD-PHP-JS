<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];

    $result = mysqli_query($koneksi, "SELECT * FROM reyhan WHERE id_barang = '$id_barang'");

    if (!$result) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Barang</title>
</head>

<body>
    <form action="update_barang.php" method="post">
        <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
        <table align="center" width="500" border="1">
            <tr>
                <td colspan="2" align="center">
                    <h2>FORM EDIT Barang</h2>
                </td>
            </tr>

            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="barang" id="barang" value="<?php echo $row['barang']; ?>" placeholder="Nama Barang"></td>
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