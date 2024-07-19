<?php

include '../koneksi.php';


$NamaKategori  = $_POST['NamaKategori'];
$KodeBuku  =  $_POST['KodeBuku'];

$query = mysqli_query($connection, "INSERT INTO kategoribuku(NamaKategori,KodeBuku) values('$NamaKategori','$KodeBuku')");


if($query) {

    header("location: kategori.php");

} else {

    echo "Data Gagal Disimpan!";

}

?>