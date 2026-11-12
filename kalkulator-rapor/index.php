<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Nilai Rapor-Ymn</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Kalkulator Nilai Rapor</h2>
    <hr>

    <!-- Form untuk menginput nilai -->
    <form method="POST" action="">
        <label>Nilai Tugas (Bobot 30%):</label><br>
        <input type="number" name="tugas" required><br><br>

        <label>Nilai UTS (Bobot 30%):</label><br>
        <input type="number" name="uts" required><br><br>

        <label>Nilai UAS (Bobot 40%):</label><br>
        <input type="number" name="uas" required><br><br>

        <button type="submit" name="hitung">Hitung Nilai</button>
    </form>

    <br>
    <hr>

    <?php
    // 1. Fungsi dengan parameter dan return untuk menghitung nilai akhir
    function hitungNilaiAkhir($tugas, $uts, $uas) {
        $akhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
        return $akhir;
    }

    // 2. Fungsi untuk menentukan predikat menggunakan if/elseif
    function tentukanPredikat($nilai) {
        if ($nilai >= 85) {
            return "A";
        } elseif ($nilai >= 75) {
            return "B";
        } elseif ($nilai >= 65) {
            return "C";
        } else {
            return "D";
        }
    }

    // 3. Pengecekan jika tombol "Hitung Nilai" diklik
    if (isset($_POST['hitung'])) {
        // Mengambil data dari inputan form
        $nilaiTugas = $_POST['tugas'];
        $nilaiUTS   = $_POST['uts'];
        $nilaiUAS   = $_POST['uas'];

        // Memanggil fungsi
        $nilaiAkhir = hitungNilaiAkhir($nilaiTugas, $nilaiUTS, $nilaiUAS);
        $predikat   = tentukanPredikat($nilaiAkhir);

        // Menampilkan hasil menggunakan echo dan titik (.)
        echo "<h3>Hasil Perhitungan:</h3>";
        echo "Nilai Tugas: " . $nilaiTugas . "<br>";
        echo "Nilai UTS: " . $nilaiUTS . "<br>";
        echo "Nilai UAS: " . $nilaiUAS . "<br><br>";
        echo "<hr><br>";
        echo "<b>Nilai Akhir: " . $nilaiAkhir . "</b><br>";
        echo "<b>Predikat: " . $predikat . "</b>";
    }
    ?>

</body>
</html>