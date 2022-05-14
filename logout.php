<?php
//Inisialisasi sesi
session_start();
 
//Unset seluruh variabel sesi
$_SESSION = array();
 
//Menghancurkan sesi
session_destroy();
 
//Membawa pengguna kembali ke halaman login
header("location: login.php");
exit;
?>