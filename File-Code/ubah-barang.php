
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
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
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="date"] {
            cursor: pointer;
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

<?php
include "koneksi.php";

if (isset($_POST['proses'])) {
    // Memeriksa data biar tidak ada empty string
    $tanggal = isset($_POST['Tanggal']) ? $_POST['Tanggal'] : '';
    $namaBarang = isset($_POST['Nama_barang']) ? $_POST['Nama_barang'] : '';
    $hargaSatuan = isset($_POST['Harga_satuan']) ? $_POST['Harga_satuan'] : '';
    $jenisBarang = isset($_POST['Jenis_barang']) ? $_POST['Jenis_barang'] : '';

    if (empty($tanggal) || empty($namaBarang) || 
    empty($hargaSatuan) || empty($jenisBarang)) {} 
    else {
        // Kalo tidak ada empty sring update barang  
        mysqli_query($koneksi, "UPDATE barang SET
            Tanggal='$tanggal',
            Nama_Barang='$namaBarang',
            Harga_Satuan='$hargaSatuan',
            Jenis_Barang='$jenisBarang'
            WHERE No_Item='{$_GET['kode']}'");
        echo "<meta http-equiv=refresh content=1;URL='dataBarang.php'>";
    }   
}

// mengambil data dari kode yang di tunjuk oleh user 
$sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE No_Item='$_GET[kode]'");
$data = mysqli_fetch_array($sql);
?>


<form action="" method="post">
    <h3>edit barang</h3>
    <table>
        <tr>
            <td>Kode Barang</td>
            <td><input type="text" name="No_Item" class="input" placeholder="Unique Number"
            value="<?php echo $data['No_Item']; ?>"></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="date" name="Tanggal" class="input" id="inputTanggal"
            value="<?php echo $data['Tanggal']; ?>"></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><input placeholder="Nama Barang" type="text" name="Nama_barang" class="input"
            value="<?php echo $data['Nama_barang']; ?>"></td>
        </tr>
        <tr>
            <td>Harga Satuan</td>
            <td><input placeholder="100000" type="text" name="Harga_satuan" class="input" 
            value="<?php echo $data['Harga_satuan']; ?>"></td>
        </tr>
        <tr>
            <td>Jenis Barang</td>
            <td><input placeholder="Elektronik" type="text" name="Jenis_barang" class="input"
            value="<?php echo $data['Jenis_barang']; ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="SIMPAN" name="proses" class="input" ></td>
        </tr>
    </table>
</form>

<script src="script.js"></script>
</body>
</html>
