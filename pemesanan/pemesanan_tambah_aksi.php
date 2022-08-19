
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
		
	// checking empty fields
	
		// if all the fields are filled (not empty) 
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO `tb_pemesanan_undangan_pernikahan`
		(`id_pemesan`, `tgl_pemesanan`, `nama_pengantin_putra`, `nama_orangtua_pengantin_putra`, `nama_pengantin_putri`, `nama_orangtua_pengantin_putri`, `alamat_resepsi`, `waktu_resepsi`, `tanggal_resepsi`) VALUES 
		('$id',now(),'$nama_pengantin_putra','$nama_orangtua_pengantin_putra','$nama_pengantin_putri','$nama_orangtua_pengantin_putri','$alamat_resepsi','$waktu_resepsi','$tanggal_resepsi')");
		?>
			<script>alert("data berhasil ditambah");</script>
		<?php
		//tampilan
		header("Location: pemesanan.php");

}
?>