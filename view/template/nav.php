
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../assets/index3.html" class="navbar-brand">
        <img src="../../assets/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PERCETAKAN</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../../" class="nav-link">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a href="pemesan.php" class="nav-link">Pemesan</a>
          </li> -->
          <li class="nav-item">
            <a href="../../pemesanan/pemesanan.php" class="nav-link">Pemesanan</a>
          </li>
        </ul>


        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
              <?php
              if (isset($_SESSION['id_admin'])) {
                echo"<label class='btn '>Admin</label>";
              }
              if (isset($_SESSION['id_pemesan'])) {
                echo"<label class='btn '>Pemesan</label>";
              }
              ?>
        </li>
            <li class="nav-item">
                <a href="../../Login/logout.php" onclick="return confirm('Apakah anda yakin ingin Logout ?')" class="btn btn-dark">Logout</a>

            </li>
        </ul>
    </div>
    
    
</div>
  </nav>
  <!-- /.navbar -->