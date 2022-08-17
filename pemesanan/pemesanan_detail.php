<?php 
include '../config.php';
session_start();

$id=$_GET['id'];
$query = "SELECT * FROM tb_pemesan where id_pemesan='$id'";
$result = mysqli_query($mysqli, $query);
foreach ($result as $data) {
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>


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
            <h1 class="m-0">Pemesanan</h1>
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

          <form action="" method="post">
            <h5 class="text-center" >Data Pemesan</h5>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label >Name</label>
                <input type="Name" class="form-control" placeholder="Name" value="Name">
              </div>
              <div class="form-group col-md-6">
                <label >No. HP</label>
                <input type="No. HP" class="form-control" placeholder="No. HP" value="No. HP">
              </div>
            </div>
            <hr>
            <h5 class="text-center pt-1" >Data Pernikahan</h5>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label >Nama Pengantin Laki-laki</label>
                  <input type="text" class="form-control" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                  <label >Nama Orang tua Pengantin Laki-laki</label>
                  <input type="text" class="form-control" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label >Tanggal</label><br>
                    <input type="date" class="form-control" id="start" name="trip-start"
                      value="2022-01-01"
                      min="2022-01-01" max="2024-12-31">
                  </div>
              </div>
              <div class="col">
                <div class="form-group">
                    <label >Nama Pengantin Perempuan</label>
                    <input type="text" class="form-control" placeholder="1234 Main St">
                  </div>
                  <div class="form-group">
                    <label >Nama Orang tua Pengantin Perempuan</label>
                    <input type="text" class="form-control" placeholder="1234 Main St">
                  </div>
                  <div class="form-group">
                    <label >Waktu</label><br>
                    <input type="time" class="form-control" id="appt" name="appt"
                    min="08:00" max="18:00" required>
                  </div>
              </div>
            </div>
              
            
            <div class="form-group">
              <label >Alamat</label><br>
              <textarea class="form-control" name="alamat" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
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
