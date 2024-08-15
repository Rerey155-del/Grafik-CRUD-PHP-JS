<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Barang</title>
</head>
<body>
    <form action="save_barang.php" method="post">
        <table align="center" width="500" border="1">
            <tr>
                <td colspan="2" align="center">
                    <h2>FORM TAMBAH Barang</h2>
                </td>
            </tr>

            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="barang" id="barang" placeholder="Nama Barang"></td>
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
