<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambil dan Urutkan Angka dari Dua Array</title>
</head>
<body>
    <h1>Gabungkan dan Urutkan Angka dari Dua Array</h1>
    <form method="post">
        <label for="nums1">Array 1 (pisahkan dengan koma):</label>
        <input type="text" id="nums1" name="nums1" placeholder="Contoh: 1,2,3"><br><br>
        
        <label for="nums2">Array 2 (pisahkan dengan koma):</label>
        <input type="text" id="nums2" name="nums2" placeholder="Contoh: 2,5,6"><br><br>

        <label for="m">Berapa banyak angka yang ingin diambil dari Array 1 (M)?</label>
        <input type="number" id="m" name="m" min="0" placeholder="Contoh: 2"><br><br>

        <label for="n">Berapa banyak angka yang ingin diambil dari Array 2 (N)?</label>
        <input type="number" id="n" name="n" min="0" placeholder="Contoh: 2"><br><br>

        <button type="submit">Gabungkan dan Urutkan</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil input dari form
            $nums1Input = isset($_POST['nums1']) ? explode(',', $_POST['nums1']) : [];
            $nums2Input = isset($_POST['nums2']) ? explode(',', $_POST['nums2']) : [];
            
            // Konversi string input ke integer
            $nums1 = array_map('intval', $nums1Input);
            $nums2 = array_map('intval', $nums2Input);

            // Ambil limit dari form
            $m = isset($_POST['m']) ? intval($_POST['m']) : 0;
            $n = isset($_POST['n']) ? intval($_POST['n']) : 0;

            // Debugging output
            echo "<pre>";
            echo "Array 1: " . implode(', ', $nums1) . "\n";
            echo "Array 2: " . implode(', ', $nums2) . "\n";
            echo "M: $m\n";
            echo "N: $n\n";
            echo "</pre>";

            // Fungsi untuk mengambil angka terbatas, menggabungkan, dan mengurutkan
            function limitAndMergeSort($nums1, $nums2, $m, $n) {
                // Ambil hanya sejumlah angka sesuai limit dari array 1 dan 2
                $limitedNums1 = array_slice($nums1, 0, $m);
                $limitedNums2 = array_slice($nums2, 0, $n);

                // Gabungkan kedua array
                $mergedArray = array_merge($limitedNums1, $limitedNums2);

                // Urutkan array hasil penggabungan
                sort($mergedArray);

                // Kembalikan array hasil penggabungan dan pengurutan
                return $mergedArray;
            }

            // Panggil fungsi untuk menggabungkan, mengurutkan, dan menampilkan hasil
            $resultArray = limitAndMergeSort($nums1, $nums2, $m, $n);

            // Tampilkan hasil
            echo "<h2>Array Setelah Digabungkan dan Diurutkan:</h2>";
            echo "<p>" . implode(', ', $resultArray) . "</p>";
        }

    ?>
</body>
</html>
