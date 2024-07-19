<?php

include '../koneksi.php';

$KodeBuku = $_POST['KodeBuku'];
$NamaKategori  = $_POST['NamaKategori'];

$query = mysqli_query($connection, "INSERT INTO kategori(KategoriID,KodeBuku,NamaKategori) values('$KategoriID','$KodeBuku','$NamaKategori')");

if($query) {

    header("location: kategori.php");

} else {

    echo "Data Gagal Disimpan!";

}

?>