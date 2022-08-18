<?php 
include 'config.php';
session_start();


if (isset($_SESSION['id_pemesan'])) {//jika login sebagai admin
  $id = $_SESSION['id_pemesan'];
  //ambil data admin
  $query = "SELECT * FROM tb_pemesan where id_pemesan='$id'";
  $login = mysqli_query($mysqli, $query);
  foreach ($login as $data) {
    $id =  $data['id_pemesan'];
    $nama =  $data['nama'];
    $no_hp = $data['no_hp'];
  }
}

if (isset($_SESSION['id_admin'])) {//jika login sebagai admin
  $id = $_SESSION['id_admin'];
  //ambil data admin
  $query = "SELECT * FROM tb_admin where id_admin='$id'";
  $login = mysqli_query($mysqli, $query);
  foreach ($login as $data) {
    $id =  $data['id_admin'];
    $username =  $data['username'];
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


  <?php include 'view/template/css.php';  ?>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <?php include 'view/template/nav.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li> -->
              <li class="breadcrumb-item active">Home</li>
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
          <div class="card-body d-flex">
            <div class="mr-auto">

              <h2>Selamat Datang, <b><?= $nama; ?></b></h2>
              <br>
              <?php
              if (isset($_SESSION['id_admin'])) {//jika login sebagai admin
                echo $username;//tampilkan username admin
              }
              ?>
              <p>No. HP = <?= $no_hp; ?></p>
            </div>
            <div class="ml-auto">
              <?php
              if (isset($_SESSION['id_admin'])){//jika login sebagai admin, tampilkan tombol data pemesanan
                echo "
                <a href='/pemesanan/pemesanan.php' class='btn btn-dark'>Data Pemesanan</a>
                ";
              }elseif (isset($_SESSION['id_pemesan'])) {//jika login sebagai admin, 
                ?>
                <a href='/pemesanan/pemesanan.php' class='btn btn-dark'>Data Pemesananku</a><!-- maka tampilkan tombol data pemesananku -->
                
                      <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-phone-alt"></i> WhatsApp Admin
                      </a>
                      
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
                      <?php
                          // mengambil data untuk mengecek nomor hp admin
                          $query = "SELECT * FROM tb_admin";
                          $anu = mysqli_query($mysqli, $query);
                          foreach ($anu as $data) {
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
                          <a class="dropdown-item" href="https://wa.me/<?=$hp?>"><?= $data['nama']?></a><!-- memasukkan nomor gateway wa di dalam tombol -->
                          <?php
                          }
                          ?>
                      </div>
                <?php
              }
              ?>
            </div>

            </div>
          </div>
        <?php
        if (isset($_SESSION['id_pemesan'])) {
                echo "
                <a href='/pemesanan/pemesanan_tambah.php' class='btn btn-dark btn-block'>Tambah Pemesanan</a>
                ";
              }?>
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

  
  <?php include 'view/template/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'view/template/js.php'; ?>
</body>
</html>
