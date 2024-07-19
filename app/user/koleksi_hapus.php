<?php
session_start();
include '../koneksi.php';

$KoleksiID = $_GET['id'];

$query = mysqli_query($connection, "DELETE FROM koleksipribadi WHERE KoleksiID=$KoleksiID");
?>
<script>
    alert('Hapus Data Berhasil');
    location.href = "koleksi.php";
</script>

