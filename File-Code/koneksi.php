<?php
$host = "localhost";    // Nama Host
$user = "root";         // User
$pass = "";             // Password kosong
$database= "tugas_db";  // Menggunakan database

$koneksi = mysqli_connect($host,$user,$pass,$database); // Untuk menghubungkan ke database
// Untuk $koneksi akan selalu dipanggil disetiap page yang menggunkan akses ke database

?>