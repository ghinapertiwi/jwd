
<?php
//including the database connection file
include "../config.php";
// var_dump($_POST);
if(isset($_POST['submit'])) {	
	$id = $_POST['id_pemesan'];
	$nama_pengantin_putra = htmlspecialchars($_POST['p_cowo']);
	$nama_orangtua_pengantin_putra = htmlspecialchars($_POST['ortu_cowo']);
	$nama_pengantin_putri = htmlspecialchars($_POST['p_cewe']);
	$nama_orangtua_pengantin_putri = htmlspecialchars($_POST['ortu_cewe']);
	$tanggal_resepsi = htmlspecialchars($_POST['tgl_resep']);
	$waktu_resepsi = htmlspecialchars($_POST['waktu_resep']);
	$alamat_resepsi = htmlspecialchars($_POST['alamat_resep']);
	// var_dump($nama_pengantin_putra);
	// die();
		
	// checking empty fields
	if( empty($nama_pengantin_putra) || empty($nama_orangtua_pengantin_putra) || empty($tanggal_resepsi) || empty($nama_pengantin_putri) || empty($nama_orangtua_pengantin_putri) || empty($waktu_resepsi) || empty($alamat_resepsi)) 
	{
				
		
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
		if(empty($tanggal_resepsi)) {
			echo "<font color='red'>Tanggal resepsi field is empty.</font><br/>";
		}

		if(empty($alamat_resepsi)) {
			echo "<font color='red'>Alamat resepsi field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// var_dump("ngangong");
		// die();
		// if all the fields are filled (not empty) 
		//insert data to database	
		$result = mysqli_query($mysqli, "UPDATE `tb_pemesanan_undangan_pernikahan` SET 
		`nama_pengantin_putra`='$nama_pengantin_putra',
		`nama_orangtua_pengantin_putra`='$nama_orangtua_pengantin_putra',
		`nama_pengantin_putri`='$nama_pengantin_putri',
		`nama_orangtua_pengantin_putri`='$nama_orangtua_pengantin_putri',
		`alamat_resepsi`='$alamat_resepsi',
		`waktu_resepsi`='$waktu_resepsi',
		`tanggal_resepsi`='$tanggal_resepsi'
		WHERE `id_pemesanan`='$id'");
		
		//tampilan
		header("Location: pemesanan.php");

	}
}
?>