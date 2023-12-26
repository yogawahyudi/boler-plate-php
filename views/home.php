<?php
$pageTitle = "Home";
ob_start(); // Start buffering output
?>

<div class="d-flex justify-content-center align-items-center flex-column" style="height: 70vh;">
    <h2>Selamat datang di Aplikasi Sistem Pengambilan Keputusan</h2>
    <p>Silahkan Login untuk menambahkan data</p>
</div>


<?php
$content = ob_get_clean(); // Get the buffered content
include('layout/layout.php');
?>
