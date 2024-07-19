<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Inventaris</title>
    <!-- Menyertakan CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Laporan Inventaris</h1>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah Produk</th>
            <th>Harga per Produk</th>
            <th>Total Nilai</th>
            <th>Status Ketersediaan</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Deklarasi array untuk menyimpan data inventaris
        $inventaris = [
            [
                'nama_produk' => 'Produk A',
                'jumlah_produk' => 10,
                'harga_per_produk' => 50000,
                'status_ketersediaan' => 'Tersedia'
            ],
            [
                'nama_produk' => 'Produk B',
                'jumlah_produk' => 5,
                'harga_per_produk' => 100000,
                'status_ketersediaan' => 'Tidak Tersedia'
            ],
            [
                'nama_produk' => 'Produk C',
                'jumlah_produk' => 20,
                'harga_per_produk' => 75000,
                'status_ketersediaan' => 'Tersedia'
            ],
        ];

        // Fungsi untuk menghitung total nilai inventaris
        function hitungTotalNilaiInventaris($inventaris) {
            $total_nilai = 0;
            foreach ($inventaris as $produk) {
                $total_nilai += $produk['jumlah_produk'] * $produk['harga_per_produk'];
            }
            return $total_nilai;
        }

        // Menghitung total nilai inventaris
        $total_nilai_inventaris = hitungTotalNilaiInventaris($inventaris);

        // Menampilkan laporan inventaris
        foreach ($inventaris as $produk) {
            $total_nilai_produk = $produk['jumlah_produk'] * $produk['harga_per_produk'];
            echo "<tr>";
            echo "<td>{$produk['nama_produk']}</td>";
            echo "<td>{$produk['jumlah_produk']}</td>";
            echo "<td>Rp " . number_format($produk['harga_per_produk'], 0, ',', '.') . "</td>";
            echo "<td>Rp " . number_format($total_nilai_produk, 0, ',', '.') . "</td>";
            echo "<td>{$produk['status_ketersediaan']}</td>";
            echo "</tr>";
        }
        ?>
        <tr>
            <td colspan="3" class="text-right font-weight-bold">Total Nilai Inventaris</td>
            <td colspan="2" class="font-weight-bold">Rp <?php echo number_format($total_nilai_inventaris, 0, ',', '.'); ?></td>
        </tr>
        </tbody>
    </table>
</div>
<!-- Menyertakan JS Bootstrap dan dependensi jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
