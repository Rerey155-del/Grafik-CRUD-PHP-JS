<!DOCTYPE html>
<html>

<head>
    <title>Grafik Penjualan Barang</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <style>
        body {
            font-family: roboto;
        }

        table {
            margin: 0px auto;
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
        <h2>Grafik Penjualan Barang</h2>
    </center>
    <?php
    include "koneksi.php";

    // Fetch data for the chart
    $query = "
        SELECT reyhan.barang, SUM(maulana.jumlah) as total_jumlah 
        FROM maulana 
        JOIN reyhan ON maulana.id_barang = reyhan.id_barang
        GROUP BY reyhan.barang
    ";
    $result = mysqli_query($koneksi, $query);

    $labels = [];
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row['barang'];
        $data[] = $row['total_jumlah'];
    }

    // Generate colors
    $colors = [
        'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 71, 0.2)', 'rgba(54, 235, 162, 0.2)',
        'rgba(235, 54, 162, 0.2)', 'rgba(255, 235, 54, 0.2)', 'rgba(132, 99, 255, 0.2)', 'rgba(192, 75, 75, 0.2)',
        'rgba(102, 153, 255, 0.2)', 'rgba(159, 255, 64, 0.2)', 'rgba(99, 255, 132, 0.2)', 'rgba(235, 99, 54, 0.2)',
        'rgba(162, 54, 235, 0.2)', 'rgba(206, 255, 86, 0.2)', 'rgba(192, 192, 75, 0.2)', 'rgba(102, 255, 153, 0.2)',
        'rgba(255, 64, 159, 0.2)', 'rgba(255, 132, 99, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(75, 235, 192, 0.2)',
        'rgba(255, 153, 102, 0.2)', 'rgba(255, 206, 159, 0.2)', 'rgba(255, 255, 99, 0.2)', 'rgba(235, 75, 54, 0.2)',
        'rgba(162, 235, 54, 0.2)', 'rgba(192, 255, 86, 0.2)'
    ];
    $borderColors = [
        'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 99, 71, 1)', 'rgba(54, 235, 162, 1)',
        'rgba(235, 54, 162, 1)', 'rgba(255, 235, 54, 1)', 'rgba(132, 99, 255, 1)', 'rgba(192, 75, 75, 1)',
        'rgba(102, 153, 255, 1)', 'rgba(159, 255, 64, 1)', 'rgba(99, 255, 132, 1)', 'rgba(235, 99, 54, 1)',
        'rgba(162, 54, 235, 1)', 'rgba(206, 255, 86, 1)', 'rgba(192, 192, 75, 1)', 'rgba(102, 255, 153, 1)',
        'rgba(255, 64, 159, 1)', 'rgba(255, 132, 99, 1)', 'rgba(54, 162, 235, 1)', 'rgba(75, 235, 192, 1)',
        'rgba(255, 153, 102, 1)', 'rgba(255, 206, 159, 1)', 'rgba(255, 255, 99, 1)', 'rgba(235, 75, 54, 1)',
        'rgba(162, 235, 54, 1)', 'rgba(192, 255, 86, 1)'
    ];

    // Encode data for JavaScript
    $labels_json = json_encode($labels);
    $data_json = json_encode($data);
    $colors_json = json_encode($colors);
    $borderColors_json = json_encode($borderColors);
    ?>
    <div style="width: 800px; margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>
    <br />
    <table>
        <tr>
            <th>No</th>
            <th>ID Penjualan</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Penjualan</th>
        </tr>
        <?php
        $no = 1;
        $data_penjualan = mysqli_query($koneksi, "
            SELECT maulana.id_penjualan, reyhan.barang, maulana.jumlah, maulana.tgl_penjualan 
            FROM maulana
            JOIN reyhan ON maulana.id_barang = reyhan.id_barang
            ORDER BY maulana.tgl_penjualan
        ");
        while ($hasil = mysqli_fetch_array($data_penjualan)) {
            // Format tanggal penjualan menjadi Tanggal Bulan Tahun
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
    </table>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo $labels_json; ?>,
                datasets: [{
                    label: 'Jumlah Penjualan',
                    data: <?php echo $data_json; ?>,
                    backgroundColor: <?php echo $colors_json; ?>,
                    borderColor: <?php echo $borderColors_json; ?>,
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