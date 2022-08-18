
<?php 
 include '../view/template/css.php';
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['id_pemesan'])) {
    header("Location: ../dashboard.php");
}
 
if (isset($_POST['submit'])) {
    $no_hp = $_POST['no_hp'];
    $nama = $_POST['nama'];
 
    $sql = "SELECT * FROM tb_pemesan WHERE no_hp='$no_hp' AND nama='$nama'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_pemesan'] = $row['id_pemesan'];

        header("Location: ../dashboard.php");
    } else {
        $result = mysqli_query($conn, "INSERT INTO `tb_pemesan`(`no_hp`, `nama`) VALUES ('$no_hp','$nama')");
        
        $sql = "SELECT * FROM tb_pemesan WHERE no_hp='$no_hp' AND nama='$nama'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_pemesan'] = $row['id_pemesan'];

        header("Location: ../dashboard.php");

    }
}
$query = "SELECT * FROM tb_admin";
$anu = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Pemesanan Undangan Pernikahan</title>
</head>
<body>
    <div class="alert" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
 
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Pemesan</p>
            <center>
                <p>Selamat Datang di Website Pemesanan Undangan Pernikahan, Silahkan masukkan data diri untuk melanjutkan</p>
            </center>
            <br>
            <div class="input-group">
                <input type="no_hp" placeholder="No HP" name="no_hp" value="<?php echo $no_hp; ?>" required>
            </div>
            <div class="input-group">
                <input type="nama" placeholder="Nama" name="nama" value="<?php echo $_POST['nama']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Lanjut Memesan</button>
            </div>
        </form>
        <div class="nav">
            <a href="admin.php"  class="btn btn-light mr-auto">Login sebagai admin</a>
            <div class="dropdown show ml-auto">
                <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kontak
                </a>
                
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
                <?php
                    
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
                    <a class="dropdown-item" href="https://wa.me/<?=$hp?>"><?= $data['nama']?></a>
                    <?php
                    }
                    ?>
                <!-- </div> -->
            </div>
            
        </div>
        
    </div>
    <?php
    include '../view/template/js.php';
    ?>
</body>
</html>