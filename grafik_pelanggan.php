<?php
include('koneksi.php');
$produk = mysqli_query($koneksi, "SELECT * FROM reyhan_maulana");

$nama_pelanggan = [];
$jumlah_produk = [];

while ($row = mysqli_fetch_array($produk)) {
    $nama_pelanggan[] = $row['nama_pelanggan'];
    $id_penjualan = $row['id_pel'];

    $query = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah FROM maulana WHERE id_penjualan = '$id_penjualan'");
    $result = mysqli_fetch_array($query);
    $jumlah_produk[] = $result['jumlah'] ?? 0; // Ensure that null values are treated as 0
}

function random_color_part()
{
    return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
}

function random_color()
{
    return '#' . random_color_part() . random_color_part() . random_color_part();
}

$background_colors = [];
$border_colors = [];

for ($i = 0; $i < count($jumlah_produk); $i++) {
    $color = random_color();
    $background_colors[] = $color . '33'; // Adding '33' to make it semi-transparent
    $border_colors[] = $color;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Membuat Grafik Menggunakan Chart JS</title>
    <script type="text/javascript" src="chartjs/Chart.js"></script>
</head>

<body>
    <div style="width: 800px; height: 800px">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama_pelanggan); ?>,
                datasets: [{
                    label: 'Grafik Pelanggan',
                    data: <?php echo json_encode($jumlah_produk); ?>,
                    backgroundColor: <?php echo json_encode($background_colors); ?>,
                    borderColor: <?php echo json_encode($border_colors); ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>