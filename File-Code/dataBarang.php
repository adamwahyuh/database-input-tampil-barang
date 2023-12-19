<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="icon" href="icon-database.ico">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            margin-top: -20px;
            padding: 0;
            background-color: #f4f4f4;
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .floating-button {
            position: fixed;
            bottom: -20px;
            left: 0px;
            z-index: 999;
        }

        .floating-button2{
            position: fixed;
            bottom: -20px;
            right: 20px;
            bottom: 5px;
            z-index: 998;
        }
        .pesan-terhapus{
            color: red;
        }
        .kembali, .download {
            text-decoration: none;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            margin-right: -20px;
            opacity: 50%;
        }
        .download {
            border: none;
            padding: 12px 15px;
            padding-bottom: 10px;
        }
        .download:hover {
            opacity: 100%;
            cursor: pointer;
        }

        a{
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {   
            color: white;
            opacity: 100%;
        }
        .Harga-isi{
            text-align: left;
        }
        
    </style>
</head>
<body>
    <table>
        <!-- Membuat table dan mengambil data dari database untuk ditampilkan  -->
        <tr>
            <th>No</th>
            <th>No Item</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Harga Satuan</th>
            <th>Jenis Barang</th>
            <th colspan="2">MODIFIKASI</th>
        </tr>
        
        <div class="floating-button2">
            <p class="pesan-terhapus" id="terhapus"></p>
        </div>
        <?php
            include "koneksi.php"; // Untuk menyambungkan ke srver
            $no = 1; // Kasih nomer urut
            
            // untuk menampilkan data ke Table / mengambil data dari database dan ditampilkan di WEB 
            $ambilData = mysqli_query($koneksi, "SELECT * from barang"); // * = Semua | pilih semua barang dari database namanya barang
            while ($tampilData = mysqli_fetch_array($ambilData)) {
                echo "
                <tr>
                    <td>$no</td>
                    <td>$tampilData[No_Item]</td>
                    <td>$tampilData[Tanggal]</td>
                    <td>$tampilData[Nama_barang]</td>
                    <td class='Harga-isi'>$tampilData[Harga_satuan]</td>
                    <td>$tampilData[Jenis_barang]</td>
                    <td><a href='?kode=$tampilData[No_Item]'>HAPUS</a></td>
                    <td><a href='ubah-barang.php?kode=$tampilData[No_Item]'>EDIT</a></td>
                </tr>";
                $no++;
            }
        ?>
    </table>

    <?php 
        // Fungsi untuk menghapus Data 
        if(isset($_GET['kode'])){
            mysqli_query($koneksi, "DELETE from barang where No_Item='$_GET[kode]'");
            echo "<script>
            document.getElementById('terhapus').innerText = 'Data Terhapus';
            </script>";
            echo "<meta http-equiv=refresh content=0.001;URL='dataBarang.php'>";
        }
    ?>
    <!-- button kembali dan button untuk download ke excel -->

    <div class="floating-button">
    <table>
        <tr>
            <td>
                <a class="kembali" href="inputBarang.php">&#60;</a> 
            </td>
            <td>
                <form method="post" action="download.php">
                    <input class="download" type="submit" value="Download (.xls)" name="export_excel">
                </form>
            </td>
        </tr>
    </table>
</div>

    <script src="script.js"></script>
</body>
</html>
