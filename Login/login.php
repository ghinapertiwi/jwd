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