<html>
<head>
	<title>Tambah</title>
</head>

<body>
<?php
//including the database connection file
include "../config.php";

if(isset($_POST['Submit'])) {	
	$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
	$no_hp = mysqli_real_escape_string($mysqli, $_POST['no_hp']);
	$nama_pengantin_putra = mysqli_real_escape_string($mysqli, $_POST['p_cowo']);
	$nama_orangtua_pengantin_putra = mysqli_real_escape_string($mysqli, $_POST['ortu_cowo']);
	$nama_pengantin_putri = mysqli_real_escape_string($mysqli, $_POST['p_cewe']);
	$nama_orangtua_pengantin_putri = mysqli_real_escape_string($mysqli, $_POST['ortu_cewe']);
	$tanggal_resepsi = mysqli_real_escape_string($mysqli, $_POST['tgl_resep']);
	$waktu_resepsi = mysqli_real_escape_string($mysqli, $_POST['waktu_resep']);
	$alamat_resepsi = mysqli_real_escape_string($mysqli, $_POST['alamat_resep']);
		
	// checking empty fields
	if(empty($nama) || empty($no_hp) || empty($nama_pengantin_putra) || empty($nama_orangtua_pengantin_putra) || empty($tanggal_resepsi) || empty($nama_pengantin_putri) || empty($nama_orangtua_pengantin_putri) || empty($waktu_resepsi) || empty($alamat_resepsi)) {
				
		if(empty($nama)) {
			echo "<font color='red'>Nama field is empty.</font><br/>";
		}
		
		if(empty($no_hp)) {
			echo "<font color='red'>No. Hp field is empty.</font><br/>";
		}
		
		if(empty($nama_pengantin_putra)) {
			echo "<font color='red'>Nama pengantin putra field is empty.</font><br/>";
		}

		if(empty($nama_orangtua_pengantin_putra)) {
			echo "<font color='red'>Nama orang tua pengantin putra field is empty.</font><br/>";
		}

		if(empty($tanggal_resepsi)) {
			echo "<font color='red'>Tanggal resepsi field is empty.</font><br/>";
		}

		if(empty($nama_pengantin_putri)) {
			echo "<font color='red'>Nama pengantin putri field is empty.</font><br/>";
		}

		if(empty($nama_orangtua_pengantin_putri)) {
			echo "<font color='red'>Nama orang tua pengantin putri field is empty.</font><br/>";
		}

		if(empty($waktu_resepsi)) {
			echo "<font color='red'>Waktu resepsi field is empty.</font><br/>";
		}

		if(empty($alamat_resepsi)) {
			echo "<font color='red'>Alamat resepsi field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO `tb_pemesanan_undangan_pernikahan`
		(`id_pemesan`, `tgl_pemesanan`, `nama_pengantin_putra`, `nama_orangtua_pengantin_putra`, `nama_pengantin_putri`, `nama_orangtua_pengantin_putri`, `alamat_resepsi`, `waktu_resepsi`, `tanggal_resepsi`) VALUES 
		('$id',now(),'$nama_pengantin_putra','$nama_orangtua_pengantin_putra','$nama_pengantin_putri','$nama_orangtua_pengantin_putri','$alamat_resepsi','$waktu_resepsi','$tanggal_resepsi')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
