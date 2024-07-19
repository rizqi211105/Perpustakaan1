<?php
include '../koneksi.php';
    $UserID = $_POST['UserID'];
    $BukuID = $_POST['BukuID'];
    $TanggalPeminjaman = $_POST['TanggalPeminjaman'];
    $TanggalPengembalian = $_POST['TanggalPengembalian'];
    $TanggalPengembalian = strtotime("+7 day", strtotime($TanggalPeminjaman)); // +7 hari dari TanggalPeminjaman
    $TanggalPengembalian = date('Y-m-d', $TanggalPengembalian); // format TanggalPeminjaman tahun-bulan-hari
    $Stok = $_POST['Stok'];
    $Denda = $_POST['Denda'];
    $Terlambat = $_POST['Terlambat'];
    $StatusPeminjaman = $_POST['StatusPeminjaman'];

    if ($Stok == 0) {
        echo '<script> alert("Stok sudah habis."); window.location="buku.php"; </script>';
        exit;
    }
    $query = mysqli_query($connection, "INSERT INTO peminjaman(UserID,BukuID,TanggalPeminjaman,TanggalPengembalian,Jumlah,Denda,Terlambat,StatusPeminjaman) values('$UserID','$BukuID','$TanggalPeminjaman','$TanggalPengembalian','$Stok','$Denda','$Terlambat','$StatusPeminjaman')");
    
    if(mysqli_affected_rows($connection) > 0) {
        echo '<script> window.location="Peminjaman.php"; </script>';
    } else {
        echo '<script> alert("Gagal meminjam buku. Silahkan coba lagi."); window.location="Peminjaman.php"; </script>';
    }

mysqli_close($connection);
?>
