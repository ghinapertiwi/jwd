<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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
              </div>
            </div>
            
            <div class="form-group">
              <label >Address</label>
              <input type="text" class="form-control" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label >City</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <label >State</label>
                <select class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label >Zip</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label" >
                  Check me out
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
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
