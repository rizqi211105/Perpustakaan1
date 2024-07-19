<?php
session_start();
include '../koneksi.php';

$BukuID = $_GET['id'];

$query = mysqli_query($connection, "DELETE FROM buku WHERE BukuID=$BukuID");
?>
<script>
    alert('Hapus Data Berhasil');
    location.href = "Buku.php";
</script>
