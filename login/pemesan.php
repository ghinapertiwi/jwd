<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['no_hp'])) {
    header("Location: ../dashboard.php");
}
 
if (isset($_POST['submit'])) {
    $no_hp = $_POST['no_hp'];
    $nama = $_POST['nama'];
 
    $sql = "SELECT * FROM tb_pemesan WHERE no_hp='$no_hp' AND nama='$nama'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['no_hp'] = $row['no_hp'];
        header("Location: ../dashboard.php");
    } else {
        echo "<script>alert('No HP atau Nama Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Niagahoster Tutorial</title>
</head>
<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
 
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Pemesan</p>
            <div class="input-group">
                <input type="no_hp" placeholder="No HP" name="no_hp" value="<?php echo $no_hp; ?>" required>
            </div>
            <div class="input-group">
                <input type="nama" placeholder="Nama" name="nama" value="<?php echo $_POST['nama']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
        </form>
        <a href="../admin/login/index.php"  class="btn">Login sebagai admin</a>
        
    </div>
</body>
</html>