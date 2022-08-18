<?php 
include '../config.php';
session_start();

$id = $_POST['id'];

$query = "SELECT * FROM tb_pemesanan_undangan_pernikahan
join tb_pemesan on tb_pemesanan_undangan_pernikahan.id_pemesan = tb_pemesan.id_pemesan
where tb_pemesanan_undangan_pernikahan.id_pemesanan = '$id'";
$result = mysqli_query($mysqli, $query);
foreach ($result as $data) {
  $nama = $data['nama'];
  $no_hp = $data['no_hp'];
  $p_cowo = $data['nama_pengantin_putra'];
  $ortu_cowo = $data['nama_orangtua_pengantin_putra'];
  $p_cewe = $data['nama_pengantin_putri'];
  $ortu_cewe = $data['nama_orangtua_pengantin_putri'];
  $alamat = $data['alamat_resepsi'];
  $jam = $data['waktu_resepsi'];
  $tgl = $data['tanggal_resepsi'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pemesanan Undangan Pernikahan</title>


  <?php include '../view/template/css.php';  ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <?php include '../view/template/nav.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Data Pemesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="#">Pemesanan</a></li> -->
              <li class="breadcrumb-item active">Pemesanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <!-- //////////////////////////////////////////////////// -->
        <div class="card">
          <div class="card-body">

          <form action="pemesanan_edit_aksi.php" method="post">
            <h5 class="text-center" >Data Pemesan</h5>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label >Name</label>
                <input type="Name" class="form-control" placeholder="Name" value="<?= $nama ?>" disabled>
              </div>
              <div class="form-group col-md-6">
                <label >No. HP</label>
                <input type="No. HP" class="form-control" placeholder="No. HP" value="<?= $no_hp ?>" disabled>
              </div>
            </div>
            <hr>
            <h5 class="text-center pt-1" >Data Pernikahan</h5>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label >Nama Pengantin Laki-laki</label>
                  <input type="text" class="form-control" value="<?= $p_cowo ?>" name="p_cowo">
                </div>
                <div class="form-group">
                  <label >Nama Orang tua Pengantin Laki-laki</label>
                  <input type="text" class="form-control" value="<?= $ortu_cowo ?>" name="ortu_cowo">
                </div>
                <div class="form-group">
                    <label >Tanggal</label><br>
                    <input type="date" class="form-control" id="start" name="tgl_resep" value="<?= $tgl ?>" >
                  </div>
              </div>
              <div class="col">
                <div class="form-group">
                    <label >Nama Pengantin Perempuan</label>
                    <input type="text" class="form-control" value="<?= $p_cewe ?>" name="p_cewe">
                  </div>
                  <div class="form-group">
                    <label >Nama Orang tua Pengantin Perempuan</label>
                    <input type="text" class="form-control" value="<?= $ortu_cewe ?>" name="ortu_cewe">
                  </div>
                  <div class="form-group">
                    <label >Waktu</label><br>
                    <input type="time" class="form-control" value="<?= $jam ?>" name="waktu_resep">
                    
                  </div>
              </div>
            </div>
              
            
            <div class="form-group">
              <label >Alamat</label><br>
              <textarea class="form-control" name="alamat_resep" rows="3" ><?= $alamat ?></textarea>
            </div>
            <div class="nav">
            <input type="hidden" name="id_pemesan" value="<?= $id ?>">
              
              <a href="pemesanan.php" class="btn btn-dark mr-auto">Kembali</a>
              <button type="submit" name="submit" class="btn btn-primary ml-auto">Simpan</button>
            </div>
          </form>
                            

            </div>
          </div>
        </div>
        <!-- //////////////////////////////////////////////////// -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
  <?php include '../view/template/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include '../view/template/js.php'; ?>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
