<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Kelulusan Mahasiswa</title>
    <!-- Menyertakan CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Status Kelulusan Mahasiswa</h1>
        <form method="post" action="" class="mb-4">
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="q1">Nilai Q1:</label>
                <input type="number" id="q1" name="q1" class="form-control" step="any" required>
            </div>
            <div class="form-group">
                <label for="q2">Nilai Q2:</label>
                <input type="number" id="q2" name="q2" class="form-control" step="any" required>
            </div>
            <div class="form-group">
                <label for="uts">Nilai UTS:</label>
                <input type="number" id="uts" name="uts" class="form-control" step="any" required>
            </div>
            <div class="form-group">
                <label for="uas">Nilai UAS:</label>
                <input type="number" id="uas" name="uas" class="form-control" step="any" required>
            </div>
            <div class="form-group">
                <label for="proyek">Nilai Proyek:</label>
                <input type="number" id="proyek" name="proyek" class="form-control" step="any" required>
            </div>
            <button type="submit" class="btn btn-primary">Cek Kelulusan</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari form
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $q1 = $_POST['q1'];
            $q2 = $_POST['q2'];
            $uts = $_POST['uts'];
            $uas = $_POST['uas'];
            $proyek = $_POST['proyek'];

            // Validasi input
            if (is_numeric($q1) && is_numeric($q2) && is_numeric($uts) && is_numeric($uas) && is_numeric($proyek)) {
                // Menghitung nilai akhir
                $nilai_akhir = ($q1 * 0.10) + ($q2 * 0.10) + ($uts * 0.10) + ($uas * 0.20) + ($proyek * 0.50);

                // Menentukan status kelulusan
                $status_kelulusan = $nilai_akhir > 60 ? "Lulus" : "Tidak Lulus";
                
                // Menampilkan hasil
                echo "
                <div class='mt-4'>
                    <h3>Hasil Evaluasi</h3>
                    <ul class='list-group'>
                        <li class='list-group-item'><strong>NIM:</strong> {$nim}</li>
                        <li class='list-group-item'><strong>Nama:</strong> {$nama}</li>
                        <li class='list-group-item'><strong>Nilai Q1:</strong> " . number_format($q1, 2) . "</li>
                        <li class='list-group-item'><strong>Nilai Q2:</strong> " . number_format($q2, 2) . "</li>
                        <li class='list-group-item'><strong>Nilai UTS:</strong> " . number_format($uts, 2) . "</li>
                        <li class='list-group-item'><strong>Nilai UAS:</strong> " . number_format($uas, 2) . "</li>
                        <li class='list-group-item'><strong>Nilai Proyek:</strong> " . number_format($proyek, 2) . "</li>
                        <li class='list-group-item'><strong>Nilai Akhir:</strong> " . number_format($nilai_akhir, 2) . "</li>
                        <li class='list-group-item'><strong>Status Kelulusan:</strong> {$status_kelulusan}</li>
                    </ul>
                </div>";
            } else {
                echo "<div class='alert alert-danger mt-4'>Input tidak valid. Pastikan semua nilai yang dimasukkan adalah angka.</div>";
            }
        }
        ?>

    </div>
    <!-- Menyertakan JS Bootstrap dan dependensi jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
