<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Persegi Panjang</title>
    <!-- Menyertakan CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Perhitungan Persegi Panjang</h1>
        <form method="post" action="" class="mb-4">
            <div class="form-group">
                <label for="panjang">Panjang:</label>
                <input type="number" id="panjang" name="panjang" class="form-control" step="any" required>
            </div>
            <div class="form-group">
                <label for="lebar">Lebar:</label>
                <input type="number" id="lebar" name="lebar" class="form-control" step="any" required>
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari form
            $panjang = $_POST['panjang'];
            $lebar = $_POST['lebar'];

            // Validasi input
            if (is_numeric($panjang) && is_numeric($lebar) && $panjang > 0 && $lebar > 0) {
                // Menghitung luas, keliling, dan panjang diagonal
                $luas = $panjang * $lebar;
                $keliling = 2 * ($panjang + $lebar);
                $diagonal = sqrt($panjang**2 + $lebar**2);
                
                // Menampilkan hasil perhitungan
                echo "
                <div class='mt-4'>
                    <h3>Hasil Perhitungan</h3>
                    <ul class='list-group'>
                        <li class='list-group-item'>Luas: " . number_format($luas, 2) . " satuan<sup>2</sup></li>
                        <li class='list-group-item'>Keliling: " . number_format($keliling, 2) . " satuan</li>
                        <li class='list-group-item'>Panjang Diagonal: " . number_format($diagonal, 2) . " satuan</li>
                    </ul>
                </div>";
            } else {
                echo "<div class='alert alert-danger mt-4'>Input tidak valid. Pastikan panjang dan lebar lebih besar dari 0.</div>";
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
