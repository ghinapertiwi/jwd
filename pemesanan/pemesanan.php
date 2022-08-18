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
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">

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
                ?><a href='pemesanan_tambah.php' class='btn btn-dark'><i class="fas fa-plus"></i> Tambah Pemesanan</a><?php
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
                      <th>Status</th>
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
                  
                  if(!preg_match('/[^+0-9]/',trim($data['no_hp']))){
                    // cek apakah no hp karakter 1-3 adalah +62
                    if(substr(trim($data['no_hp']), 0, 3)=='62'){
                        $hp = trim($data['no_hp']);
                    }
                    // cek apakah no hp karakter 1 adalah 0
                    elseif(substr(trim($data['no_hp']), 0, 1)=='0'){
                        $hp = '62'.substr(trim($data['no_hp']), 1);
                    }
                }
                  ?>
                  <tr>
                      <td><?= $data['nama'];?></td>
                      <td><a href="https://wa.me/<?=$hp?>" class="btn  btn-success"><i class="fas fa-phone-alt"></i> <?= $hp;?></a></td>
                      <td><?= $data['tgl_pemesanan'];?></td>
                      <td><?= $data['nama_pengantin_putra'];?> & <?= $data['nama_pengantin_putri'];?> </td>
                      <td><b><?= strtoupper($data['status']);?></b></td>
                      <td class="d-flex ">
                        <a href='/pemesanan/pemesanan_detail.php?id=<?= $data['id_pemesanan'];?>' class='btn btn-dark mx-1'><i class="fas fa-file-alt"></i> Detail</a>

                        <form action="proses.php" method='post'>
                        <input type='hidden' name='id' value='<?= $data['id_pemesanan']?>'>
                        
                        <?php
                        if (isset($_SESSION['id_admin'])){
                          if ($data['status'] == 'pemesanan') {
                            ?>
                            <button name='proses' type='submit' class='btn btn-dark mx-1'><i class="fas fa-check"></i> Konfirmasi Proses</button>
                            <?php
                          }elseif ($data['status'] == "proses") {
                            ?>
                            <button name='cetak' type='submit' class='btn btn-dark mx-1'><i class="fas fa-check"></i> Konfirmasi Cetak</button>
                            <?php
                          }elseif ($data['status'] == 'cetak') {
                            ?>
                            <button name='selesai' type='submit' class='btn btn-dark mx-1'><i class="fas fa-check"></i> Konfirmasi Selesai</button>
                            <?php
                          }
                        }
                        if (isset($_SESSION['id_pemesan'])) 
                        {
                          if ($data['status'] == 'pemesanan') {
                          ?>
                          <button name='edit' formaction="pemesanan_edit.php" type='submit' class='btn btn-dark'><i class="fas fa-edit"></i> Edit</button>
                          <?php
                          }
                          ?>
                          <button name='hapus' type='submit' class='btn btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')"><i class="fas fa-trash"></i> Hapus</button>
                          <?php
                        }
                        ?>
                        </form>
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
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
              responsive: true
            });
            
        });
    </script>
</body>
</html>
