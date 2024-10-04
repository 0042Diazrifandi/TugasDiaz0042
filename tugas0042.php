<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Diskon Belanja</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #e0c8b2, #a1887f); 
            margin: 0;
            padding: 0;
            color: #4a2c2a; 
        }

        .container {
            max-width: 600px;
            margin: 80px auto;
            background-color: #fffaf0; 
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); 
            border-radius: 12px;
            border: 1px solid #d1c4b1;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .container:hover {
            transform: translateY(-10px); 
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2); 
        }

        h1 {
            text-align: center;
            color: #5d4037; 
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        form {
            display: flex;
            flex-direction: column;
            animation: fadeIn 1s ease; 
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        label {
            margin: 10px 0 5px;
            color: #6d4c41; 
            font-weight: 600;
        }

        input[type="text"], select {
            padding: 14px;
            border: 1px solid #a1887f;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #fff;
            color: #4a2c2a;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, select:focus {
            outline: none;
            border-color: #5d4037;
            box-shadow: 0 0 8px rgba(93, 64, 55, 0.4); 
        }

        input[type="text"]:invalid {
            border-color: #e57373; 
            box-shadow: 0 0 8px rgba(229, 115, 115, 0.5);
        }

        input[type="submit"] {
            padding: 14px;
            background-color: #795548;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #5d4037;
            transform: translateY(-3px); 
        }

        input[type="submit"]:active {
            transform: translateY(1px); 
        }

        .result {
            padding: 15px;
            background-color: #f0e5da; 
            border-radius: 8px;
            margin-top: 20px;
            font-size: 18px;
            color: #4e342e;
            border: 1px solid #a1887f;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); 
            animation: slideIn 0.6s ease; 
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        input[type="text"]:invalid:focus {
            border-color: #e57373;
            box-shadow: 0 0 10px rgba(229, 115, 115, 0.6); 
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Hitung Diskon Belanja</h1>
    <form method="POST">
        <label for="total_belanja0042">Total Belanja (Rp):</label>
        <input type="text" id="total_belanja0042" name="total_belanja0042" required>

        <label for="is_member0042">Apakah Anda Member?</label>
        <select id="is_member0042" name="is_member0042">
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select>

        <input type="submit" value="Hitung Diskon">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $total_belanja0042 = $_POST['total_belanja0042'];
        $is_member0042 = $_POST['is_member0042'];

        function hitungDiskon0042($total_belanja0042, $is_member0042) {
            $diskon0042 = 0;
            $diskon_member0042 = $total_belanja0042 - 0.10 * $total_belanja0042;

            if ($is_member0042) {
                if ($total_belanja0042 > 1000000) {
                    $diskon0042 = 0.10 * $total_belanja0042 + 0.15 * $diskon_member0042;
                } elseif ($total_belanja0042 >= 500000) {
                    $diskon0042 = 0.10 * $total_belanja0042 + 0.10 * $diskon_member0042;
                } else {
                    $diskon0042 = $diskon_member0042;
                }
            } else {
                if ($total_belanja0042 > 1000000) {
                    $diskon0042 = 0.10 * $total_belanja0042;
                } elseif ($total_belanja0042 >= 500000) {
                    $diskon0042 = 0.05 * $total_belanja0042;
                }
            }

            $total_bayar0042 = $total_belanja0042 - $diskon0042;
            return array('total_belanja0042' => $total_belanja0042, 'diskon0042' => $diskon0042, 'total_bayar0042' => $total_bayar0042);
        }

        $result0042 = hitungDiskon0042($total_belanja0042, $is_member0042);

        // Menampilkan hasilnya
        echo "<div class='result' id='result'>"; // Tambahkan id untuk div hasil
        echo "Total Belanja: Rp " . number_format($result0042['total_belanja0042'], 0, ',', '.') . "<br>";
        echo "Diskon: Rp " . number_format($result0042['diskon0042'], 0, ',', '.') . "<br>";
        echo "Total Bayar: Rp " . number_format($result0042['total_bayar0042'], 0, ',', '.');
        echo "</div>";

        // Tambahkan script untuk menghilangkan hasil setelah 5 detik
        echo "<script>
            setTimeout(function() {
                document.getElementById('result').style.display = 'none';
            }, 5000);
        </script>";
    }
    ?>
</div>

</body>
</html>
