<?php
include "koneksi.php";
$output = '';
if (isset($_POST["export_excel"])){
    $sql = "SELECT * FROM barang ORDER BY No_Item ASC";
    $result = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($result) > 0){
        $output .= '
        <table class ="table-download" style="border-collapse: collapse; width: 100%;">
            <tr>
                <th style="border: 1px solid #ddd;">NO</th>
                <th style="border: 1px solid #ddd;">No Item</th>
                <th style="border: 1px solid #ddd;">Tanggal</th>
                <th style="border: 1px solid #ddd;">Nama Barang</th>
                <th style="border: 1px solid #ddd;">Harga Satuan</th>
                <th style="border: 1px solid #ddd;">Jenis Barang</th>
            </tr>
        ';

        $no = 1;
        while ($row = mysqli_fetch_array($result)){
            $output .= "
                <tr>
                    <td style='border: 1px solid #ddd;'>$no</td>
                    <td style='border: 1px solid #ddd;'>{$row['No_Item']}</td>
                    <td style='border: 1px solid #ddd;'>{$row['Tanggal']}</td>
                    <td style='border: 1px solid #ddd;'>{$row['Nama_barang']}</td>
                    <td style='border: 1px solid #ddd; text-align :left;'>{$row['Harga_satuan']}</td>
                    <td style='border: 1px solid #ddd;'>{$row['Jenis_barang']}</td>
                </tr>
            ";
            $no++;
        }

        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename= data-barang.xls");
        echo $output;
    }
}
?>
