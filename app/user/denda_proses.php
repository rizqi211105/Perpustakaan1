<?php
// koneksi

include '../koneksi.php';
if (isset($_POST['submit'])) {
 // untuk disimpan didatabase
 $UserID = $_POST['UserID'];
 $BukuID = $_POST['BukuID'];
 $TanggalPeminjaman = $_POST['TanggalPeminjaman'];
 $TanggalPengembalian = strtotime("+7 day", strtotime($TanggalPeminjaman)); // +7 hari dari tgl peminjaman
 $TanggalPengembalian = date('Y-m-d', $TanggalPengembalian); // format tgl peminjaman tahun-bulan-hari
 $Jumlah = $_POST['Jumlah'];
 $Keterlambatan = $_POST['Keterlambatan'];
 $Denda = $_POST['Denda'];
 $query = mysqli_query($connection, "INSERT INTO denda(UserID,BukuID,TanggalPeminjaman,TanggalPengembalian,Jumlah,Keterlambatan,Denda) values('$UserID','$BukuID','$TanggalPeminjaman','$TanggalPengembalian','$Stok','$Keterlambatan','$Denda')");

 unset($_POST['submit']);
}
if(mysqli_affected_rows($connection) > 0) {
    echo '<script> window.location="denda.php"; </script>';
} else {
    echo '<script> alert("Gagal meminjam buku. Silahkan coba lagi."); window.location="denda.php"; </script>';
}

mysqli_close($connection);
?>
?>