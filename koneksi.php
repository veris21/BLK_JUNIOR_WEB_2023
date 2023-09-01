<?php
$title = "Balai Latihan Kerja Industri Prov. Bangka Belitung";
$servername = "localhost"; // Hostname Server Database
$username = "root"; // Username Dari Database (Sesuaikan Dengan Setting Masing - Masing)
$password = "root"; // Password Dari Database (Sesuaikan Dengan Setting Masing - Masing)
$database = "blki"; // Nama database (Sesuaikan Dengan Nama database Masing - Masing)
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    $status_koneksi =  "FAILED";
}
$status_koneksi =  "SUCCESS";
?>