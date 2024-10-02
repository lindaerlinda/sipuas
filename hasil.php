<?php
require "koneksi.php";
$allNilai = get_AllNilai($conn);
$jumlahNilai = get_JumlahNilai($conn);
$eachNilai = get_EachNilai($conn);
$eachKeterangan = get_EachKeterangan($conn);

foreach ($eachNilai as $item) {
    $labels1[] = $item['nilai'];
    $counts1[] = $item['count'];
}

foreach ($eachKeterangan as $item) {
    $labels2[] = $item['keterangan'];
    $counts2[] = $item['count'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5 gap-5 d-flex flex-column align-items-center">
        <div class="d-flex justify-content-center align-items-center position-relative w-100">
            <a href="index.php" class="position-absolute start-0">
                <button class="btn btn-sm btn-outline-secondary">
                    Kembali ke Penilaian
                </button>
            </a>
            <h1 class="fs-2 fw-bold text-success">Hasil Penilaian</h1>
        </div>
        <div class="row w-100 d-flex justify-content-center">
            <div class="col-3">
                <canvas id="myChart1">
                </canvas>
            </div>
            <div class="col-7">
                <canvas id="myChart2">
                </canvas>
            </div>
        </div>
        <table class="table table-striped table-sm w-50">
            <thead>
                <th>No</th>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Waktu</th>
            </thead>
            <?php $i = 1;
            foreach ($allNilai as $row): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row["nilai"] ?></td>
                    <td><?= $row["keterangan"] ?></td>
                    <td>
                        <small>
                            <span
                                class="fw-light badge text-bg-secondary"><?= date('d/m/Y - H:i:s', strtotime($row["timestamp"])) ?></span>
                        </small>
                    </td>
                </tr>
                <?php $i++; endforeach ?>
        </table>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        const ctx1 = document.getElementById('myChart1');
        const ctx2 = document.getElementById('myChart2');
        const ctx3 = document.getElementById('myChart3');

        const chartLabels1 = <?php echo json_encode($labels1); ?>;
        const chartData1 = <?php echo json_encode($counts1); ?>;
        const jumlahNilai = <?php echo json_encode($jumlahNilai); ?>;
        const data1 = {
            labels: chartLabels1,
            datasets: [{
                label: 'Jumlah',
                data: chartData1,
                backgroundColor: [
                    'rgb(255, 205, 86)',
                    'rgb(255, 99, 132)',
                    '#20c997'
                ],
                hoverOffset: 4
            }]
        };

        new Chart(ctx1, {
            type: 'pie',
            data: data1,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Penilaian Masuk: ' + jumlahNilai,
                    }
                }
            }
        });


        const chartLabels2 = <?php echo json_encode($labels2); ?>;
        const wrapChartLabels2 = chartLabels2.map(label => label.split(' '));
        const chartData2 = <?php echo json_encode($counts2); ?>;
        const data2 = {
            labels: wrapChartLabels2,
            datasets: [{
                label: 'Jumlah',
                data: chartData2,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)'
                ],
                borderWidth: 1
            }]
        };

        new Chart(ctx2, {
            type: 'bar',
            data: data2,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 12 // set the font size for x-axis labels
                            }
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Keterangan'
                    }
                }
            }
        });

    </script>
</body>

</html>