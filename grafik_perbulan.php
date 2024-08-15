<!DOCTYPE html>
<html>

<head>
    <title>Grafik Penjualan Barang</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }
    </style>

    <center>
        <h2>Grafik Penjualan Barang per Bulan</h2>
    </center>

    <?php
    include "koneksi.php";

    // Fetch data for the chart
    $query = "
        SELECT DATE_FORMAT(maulana.tgl_penjualan, '%Y-%m') AS month_year, SUM(maulana.jumlah) AS total_jumlah
        FROM maulana
        JOIN reyhan ON maulana.id_barang = reyhan.id_barang
        GROUP BY DATE_FORMAT(maulana.tgl_penjualan, '%Y-%m')
    ";
    $result = mysqli_query($koneksi, $query);

    $labels = [];
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = date('F Y', strtotime($row['month_year'] . '-01'));
        $data[] = $row['total_jumlah'];
    }

    // Colors (you can customize this)
    $backgroundColor = 'rgba(54, 162, 235, 0.2)';
    $borderColor = 'rgba(54, 162, 235, 1)';
    ?>

    <div style="width: 800px; margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>

    <br />

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Penjualan</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Penjualan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $data_penjualan = mysqli_query($koneksi, "
                SELECT maulana.id_penjualan, reyhan.barang, maulana.jumlah, maulana.tgl_penjualan 
                FROM maulana
                JOIN reyhan ON maulana.id_barang = reyhan.id_barang
                ORDER BY maulana.tgl_penjualan
            ");
            while ($hasil = mysqli_fetch_array($data_penjualan)) {
                $tanggal_penjualan = date('d F Y', strtotime($hasil['tgl_penjualan']));
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $hasil['id_penjualan']; ?></td>
                    <td><?php echo $hasil['barang']; ?></td>
                    <td><?php echo $hasil['jumlah']; ?></td>
                    <td><?php echo $tanggal_penjualan; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Jumlah Penjualan',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: <?php echo json_encode($backgroundColor); ?>,
                    borderColor: <?php echo json_encode($borderColor); ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>