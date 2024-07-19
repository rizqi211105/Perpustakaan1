<?php
  	session_start();
	 
	if($_SESSION['Level']==""){
		header("location:../login.php?pesan=gagal");
	  } elseif($_SESSION['Level']=="Admin"){
		header("location:../admin/admin.php?pesan=gagal");
	  } elseif($_SESSION['Level']=="Petugas"){
		header("location:../petugas/petugas.php?pesan=gagal");
	  }
	$UserID = $_SESSION['UserID'];
	?>

<?php
    include '../koneksi.php';
    if(isset($_POST['Koleksi'])) {   
		$BukuID = $_POST['BukuID'];
        $KategoriID = $_POST['KategoriID'];
		$Cover = $r['Cover']; 
        $Judul = $_POST['Judul'];
        $Penulis = $_POST['Penulis'];
        $Penerbit = $_POST['Penerbit'];
        $TahunTerbit = $_POST['TahunTerbit'];
        $Stok = $_POST['Stok'];
		
	} 
?>
<?php
    $BukuID = $_GET['id'];
    $data = mysqli_query($connection, "SELECT * FROM buku LEFT JOIN kategoribuku ON buku.KategoriID = kategoribuku.KategoriID WHERE BukuID=$BukuID");
    while($Result = mysqli_fetch_array($data)) {
        $KategoriID = $Result['KategoriID'];
        $Cover = $Result['Cover']; 
        $Judul = $Result['Judul'];
        $Penulis = $Result['Penulis'];
        $Penerbit = $Result['Penerbit'];
        $TahunTerbit = $Result['TahunTerbit'];
        $Stok = $Result['Stok'];
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Perpuatakaan Digital</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="icon" type="icon" href="../../dist/dist/img/logo_app.png">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../../scripts/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Halaman Koleksi</h2>

					<div class="form-group">
						<img src="../../dist/dist/img/<?php echo $Cover; ?>" width="120px">
                	</div>

					<div class="row justify-content-center h3 mb-3 font-weight-normal">
                  		<input type="text" name="NamaKategori" value="<?php echo $Result['NamaKategori'] ?>" class="btn btn-info" readonly>
                	</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center align-items-center order-md-last">
						<div class="text w-100">
					<form action="koleksi_tambah.php" method="post" class="signin-form">
					<div class="form-group mb-3">
		            	<label for="text">Tahun Terbit</label>
		              <input type="text" class="form-control" name="TahunTerbit" value="<?php echo $Result['TahunTerbit'] ?>" readonly>
		            </div>

					<div class="form-group mb-3">
		            	<label for="text">Stok</label>
		              <input type="number" class="form-control" name="Stok" value="<?php echo $Result['Stok'] ?>" readonly>
		            </div>

					<div class="form-group mb-3">
            		  <label for="text">Tanggal Peminjaman</label>
            		 	<input type="date" class="form-control" name="TanggalPeminjaman" value="<?php echo date('Y-m-d'); ?>" readonly/>
            	      	<input type="date" name="TanggalPengembalian" hidden="hidden" readonly/>
            		  	<input type="hidden" value="Dipinjam" name="StatusPeminjaman" readonly/>
						<input type="hidden" name="UserID" value="<?php echo $UserID ?>" readonly>
            		  	<input type="hidden" name="BukuID" value="<?php echo $Result['BukuID'] ?>" readonly/>
         			 </div>
				</div>

			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
							
			      	</div>
							<form action="koleksi_tambah.php" method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label for="name">Judul</label>
			      			<input type="text" class="form-control" name="Judul" value="<?php echo $Result['Judul'] ?>" readonly>
			      		</div>

		            <div class="form-group mb-3">
		            	<label for="text">Penulis</label>
		              <input type="text" class="form-control" name="Penulis" value="<?php echo $Result['Penulis'] ?>" readonly>
		            </div>

					<div class="form-group mb-3">
		            	<label for="text">Penerbit</label>
		              <input type="text" class="form-control" name="Penerbit" value="<?php echo $Result['Penerbit'] ?>" readonly>
		            </div>

		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3" value="Koleksi">Tambah Koleksi</button>
		            </div>

					<div class="form-group">
		            	<a class="form-control btn btn-danger submit px-3" href="buku.php">Batal</a>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../../scripts/js/jquery.min.js"></script>
  <script src="../../scripts/js/popper.js"></script>
  <script src="../../scripts/js/bootstrap.min.js"></script>
  <script src="../../scripts/js/main.js"></script>
<?php 
}
?>
	</body>
</html>
