<?php
    require "koneksi.php";
    $rows = get_Nilai($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet" />
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
        <table class="table table-striped table-sm w-50">
                <thead>
                    <th>No</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                    <th>Waktu</th>
                </thead>
                <?php $i = 1; foreach ($rows as $row): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row["nilai"] ?></td>
                    <td><?= $row["keterangan"] ?></td>
                    <td><small><span class="fw-light badge text-bg-secondary"><?= date('d/m/Y - H:i:s', strtotime($row["timestamp"])) ?>
</span></small></td>
                </tr>
                <?php
                    $i++;
                    endforeach
                ?>
        </table>
    </div>
</body>
</html>