<?php
mysqli_report(MYSQLI_REPORT_OFF);

$servername = "sql306.infinityfree.com";  // MySQL Hostname
$username = "if0_36992088";               // MySQL Username
$password = "IGtLKGWL0yH";                // MySQL Password
$dbname = "if0_36992088_uyelik";          // MySQL Database Name

// Bağlantı oluştur
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}
?>
