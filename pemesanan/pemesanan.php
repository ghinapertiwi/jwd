<?php 
include '../config.php';
session_start();

if (isset($_SESSION['id_pemesan'])) {
  $id = $_SESSION['id_pemesan'];
  $query = "SELECT * FROM tb_pemesan where id_pemesan='$id'";
  $login = mysqli_query($mysqli, $query);
  foreach ($login as $data) {
    $id =  $data['id_pemesan'];
    $nama =  $data['nama'];
    $no_hp = $data['no_hp'];
  }
}

if (isset($_SESSION['id_admin'])) {
  $id = $_SESSION['id_admin'];
  $query = "SELECT * FROM tb_admin where id_admin='$id'";
  $login = mysqli_query($mysqli, $query);
  foreach ($login as $data) {
    $id =  $data['id_admin'];
    $nama =  $data['username'];
    $nama =  $data['nama'];
    $no_hp = $data['no_hp'];
  }
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
            <h1 class="m-0">Pemesanan
              <?php
              if (isset($_SESSION['id_pemesan'])) {
                echo "<a href='pemesanan_tambah.php' class='btn btn-dark'>Tambah Pemesanan</a>";
              }
              ?>

            </h1>
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

          <table id="example" class="table table-striped table-bordered">
            
              <thead>
                  <tr>
                      <th>Nama Pemesan</th>
                      <th>No HP Pemesan</th>
                      <th>Tanggal Pemesanan</th>
                      <th>Nama Pengantin</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_SESSION['id_pemesan'])) {
                $query = "SELECT * FROM tb_pemesanan_undangan_pernikahan
                join tb_pemesan on tb_pemesanan_undangan_pernikahan.id_pemesan = tb_pemesan.id_pemesan
                where tb_pemesan.id_pemesan = '$id'";
                }elseif (isset($_SESSION['id_admin'])) {
                $query = "SELECT * FROM tb_pemesanan_undangan_pernikahan
                join tb_pemesan on tb_pemesanan_undangan_pernikahan.id_pemesan = tb_pemesan.id_pemesan";
                }

                $result = mysqli_query($mysqli, $query);
                foreach ($result as $data) {
                  ?>
                  <tr>
                      <td><?= $data['nama'];?></td>
                      <td><?= $data['no_hp'];?></td>
                      <td><?= $data['tgl_pemesanan'];?></td>
                      <td><?= $data['nama_pengantin_putra'];?></td>
                      <td>
                        <a href='/pemesanan/pemesanan_detail.php?id=<?= $data['id_pemesanan'];?>' class='btn btn-dark'>Detail</a>
                        <?php
                        if (isset($_SESSION['id_admin'])){
                          echo "
                          <a href='/pemesanan/pemesanan.php' class='btn btn-dark'>Konfirmasi Proses</a>
                          ";
                        }
                        ?>
                        <!-- <a href='pemesanan_detail.php' class='btn btn-dark'>Detail</a> -->
                        <!-- <a href='#' class='btn btn-dark'>Konfirmasi Proses</a> -->
                        <!-- <a href='#' class='btn btn-dark'>Cetak</a>
                        <a href='#' class='btn btn-dark'>Selesai</a> -->
                      </td>
                  </tr>
                  <?php }; ?>
              </tbody>
          </table>
                            

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
