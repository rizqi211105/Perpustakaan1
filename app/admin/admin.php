<?php 
	session_start();
    include '../koneksi.php';
	if($_SESSION['Level']==""){
		header("location:../login.php?pesan=gagal");
	} elseif($_SESSION['Level']=="User"){
        header("location:../user/user.php?pesan=gagal");
    } elseif($_SESSION['Level']=="Petugas"){
        header("location:../petugas/petugas.php?pesan=gagal");
    }
    $UserID = $_SESSION['UserID'];
    $query = mysqli_query($connection, "SELECT * FROM user WHERE UserID='$UserID'");
    while($r = mysqli_fetch_array($query)) {
	?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perpustakaan Digital</title>
        <link rel="icon" type="icon" href="../../dist/dist/img/logo1.png">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../../dist/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

            <a class="navbar-brand ps-3" href="admin.php">Perpustakaan</a>
        
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
       
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>

            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="akun.php?id=<?php echo $r['UserID']; ?>">Akun</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu Utama</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-house-chimney"></i></div>
                                Beranda
                            </a>    
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Kategori
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="buku.php">Semua</a>
                                    <a class="nav-link" href="kategori.php">Kategori</a>
                                    <a class="nav-link" href="astronomi.php">Astronomi</a>
                                    <a class="nav-link" href="filsafat.php">Filsafat</a>
                                    <a class="nav-link" href="agama.php">Agama</a>
                                    <a class="nav-link" href="geografi.php">Geografi</a>
                                    <a class="nav-link" href="bahasa.php">Bahasa</a>
                                    <a class="nav-link" href="pendidikan.php">Pendidikan</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Buku
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Peminjaman
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="peminjaman.php">Histori</a>                       
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Laporan
                            </a>
                            
                            <a class="nav-link" href="anggota.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-group"></i></div>
                                Anggota
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Masuk Sebagai:</div>
                        Administrator
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <h5><p><marquee>Selamat Datang <font color= "blue"> <a href="http://localhost/PerpustakaanAl-Ihsan/app/admin/admin.php">Admin</font></a> di Perpustakaan SMK Al-Ihsan Batujajar</marquee></p></h5>
                        <h1 class="mt-1">Beranda</h1>
                        <?php
                        // Mendapatkan tanggal dan waktu saat ini
                         $date = date('Y-m-d H:i:s'); // Format tanggal dan waktu default (tahun-bulan-tanggal jam:menit:detik)
                        // Mendapatkan hari dalam format teks (e.g., Senin, Selasa, ...)
                        $day = date('l');   
                        // Mendapatkan tanggal dalam format 1 hingga 31
                        $dayOfMonth = date('d');
                        // Mendapatkan bulan dalam format teks (e.g., Januari, Februari, ...)
                        $month = date('F');
                        // Mendapatkan tahun dalam format 4 digit (e.g., 2023)
                        $year = date('Y');
                        ?>
                        <?php echo $day. " ". $dayOfMonth." ". " ". $month. " ". $year; ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Terkini</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                    <?php 
                                        echo mysqli_num_rows(mysqli_query($connection, "SELECT * FROM Kategoribuku"));
                                    ?> 
                                        Total Kategori
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="kategori.php">Lihat Detail</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">
                                    <?php 
                                        echo mysqli_num_rows(mysqli_query($connection, "SELECT * FROM buku"));
                                    ?> 
                                        Total Buku
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="buku.php">Lihat Detail</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                    <?php 
                                        echo mysqli_num_rows(mysqli_query($connection, "SELECT * FROM peminjaman"));
                                    ?> 
                                        Total Peminjaman
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="peminjaman.php">Lihat Detail</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">
                                    <?php 
                                        echo mysqli_num_rows(mysqli_query($connection, "SELECT * FROM user"));
                                    ?> 
                                        Total Akun
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="anggota.php">Lihat Detail</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        <center>
                            <a href="https://www.smkalihsanbatujajar.sch.id/"><img src="../../dist/dist/img/logo1.png" height="140px" width="140px"></a>
                                <h3><p>Perpustakaan SMK Al-Ihsan Batujajar</p></h3>
                                    <h6><p>Jl. Galanggang RT 02 RW 09 Desa Galanggang Kec. Batujajar</p></h6>
                        </center>            
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Perpustakaan Al-Ihsan Batujajar 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../../dist/js/datatables-simple-demo.js"></script>
    </body>
</html>
    <?php 
    }
    ?>