<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
    <link rel="icon" href="icon-database.ico">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h3 {
            text-align: center;
            font-variant: small-caps;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        .input {
            width: 100%;
            padding: 8px;
            margin-bottom: 1px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            text-align: center;
        }

        input[type="date"] {
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        #pesanTersimpan{
            display: inline-block;
            margin-bottom: 10px;
            color: #45a049;
        }
        
        a {
            background-color: #CB5B58;
            text-decoration: none;
            color: white;
            display: flex;
            justify-content: center;
        }
        .floating-button {
            position: fixed;
            bottom: 30px;
            left: 20px;
            z-index: 999;
           
        }
        a:hover {
            color: white;
            opacity: 100%;
        }
        .kembali {
            text-decoration: none;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            margin-right: 10px;
            opacity: 50%;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let waktuSekarang = new Date().toISOString().split('T')[0];
            let waktuOffsetMenit = (new Date()).getTimezoneOffset();
            let waktuOffsetHari = waktuOffsetMenit / (24 * 60);
            let localDate = new Date(new Date().getTime() - waktuOffsetHari * 24 * 60 * 60 * 1000).toISOString().split('T')[0];
            document.getElementById('inputTanggal').max = waktuSekarang;
        });
    </script>
</head>
<body>
<form action="" method="post">
    <h3>UPLOAD BARANG</h3> 
    <table>
        <tr>
            <td>Kode Barang</td>
            <td><input type="text" name="No_Item" class="input" placeholder="Unique Number"></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="date" name="Tanggal" class="input" id="inputTanggal"></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><input placeholder="Nama Barang" type="text" name="Nama_barang" class="input"></td>
        </tr>
        <tr>
            <td>Harga Satuan</td>
            <td><input placeholder="100000" type="text" name="Harga_satuan" class="input"></td>
        </tr>
        <tr>
            <td>Jenis Barang</td>
            <td><input placeholder="Elektronik" type="text" name="Jenis_barang" class="input"></td>
        </tr>
        <tr>
            <div>
                <td><a class="input" href="dataBarang.php">TABLE</a></td>
            </div>
            <td><input type="submit" value="SIMPAN" name="proses" class="input" ></td>
        </tr>
        <tr>
            <td><span id="pesanTersimpan"></span></td>
        </tr>
    </table>
    
</form>
<div class="floating-button">
        <a class="kembali" href="index.php">Kembali</a>
    </div>
<?php
include "koneksi.php"; // Menyambungkan ke database

/* Jika tombol simpan di tekan maka sistem akan memverivikasi dulu datanya jika 
 inputnya benar data akan segera kesimpan */
if (isset($_POST['proses'])) {
    // memverifikasi data jika data bukan empty string 
    $noItem = isset($_POST['No_Item']) ? $_POST['No_Item'] : '';
    $tanggal = isset($_POST['Tanggal']) ? $_POST['Tanggal'] : '';
    $namaBarang = isset($_POST['Nama_barang']) ? $_POST['Nama_barang'] : '';
    $hargaSatuan = isset($_POST['Harga_satuan']) ? $_POST['Harga_satuan'] : '';
    $jenisBarang = isset($_POST['Jenis_barang']) ? $_POST['Jenis_barang'] : '';
    
    /* Kalo datanya salah satu kosong maka akan memunculkan pesan invalid input 
    dan data tidak akan disimpan*/
    if (empty($noItem) || empty($tanggal) || empty($namaBarang) || empty($hargaSatuan) || empty($jenisBarang)) {
        echo "<script> 
            document.getElementById('pesanTersimpan').style.color = 'red';
            document.getElementById('pesanTersimpan').innerText = 'Invalid Input';
            </script>";
    } else { 
        // jika semua data Terisi maka data akan dimasukkan ke tablenya masing - masing 
        $query = "INSERT INTO barang SET
            No_Item='$noItem',
            Tanggal='$tanggal',
            Nama_Barang='$namaBarang',
            Harga_Satuan='$hargaSatuan',
            Jenis_Barang='$jenisBarang'";

        // dan akan menampilkan pesan Tersimpan 
        if (mysqli_query($koneksi, $query)) {
            echo "<script>
                document.getElementById('pesanTersimpan').innerText = 'Tersimpan';
            </script>";
        }
    }
}
?>
<script src="script.js"></script> <!-- untuk menyambungkan javaScript -->
</body>
</html>
