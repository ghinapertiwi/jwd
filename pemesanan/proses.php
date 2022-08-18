<?php
include '../config.php';
// konfirmasi proses
if (isset($_POST['proses'])) {
    $id = $_POST['id'];
    $query = "UPDATE `tb_pemesanan_undangan_pernikahan` SET `status` = 'proses' WHERE `tb_pemesanan_undangan_pernikahan`.`id_pemesanan` = $id";
    $result = mysqli_query($mysqli, $query);
  header("location:pemesanan.php");
}

//konfirmasi cetak
if (isset($_POST['cetak'])) {
    $id = $_POST['id'];
    $query = "UPDATE `tb_pemesanan_undangan_pernikahan` SET `status` = 'cetak' WHERE `tb_pemesanan_undangan_pernikahan`.`id_pemesanan` = $id";
    $result = mysqli_query($mysqli, $query);
  header("location:pemesanan.php");
}

// konfirmasi selesai
if (isset($_POST['selesai'])) {
    $id = $_POST['id'];
    $query = "UPDATE `tb_pemesanan_undangan_pernikahan` SET `status` = 'selesai' WHERE `tb_pemesanan_undangan_pernikahan`.`id_pemesanan` = $id";
    $result = mysqli_query($mysqli, $query);
  header("location:pemesanan.php");
}

// konfirmasi batal
if (isset($_POST['hapus'])) {
  $id = $_POST['id'];
  $query = "DELETE FROM `tb_pemesanan_undangan_pernikahan` WHERE `id_pemesanan` = $id";
  $result = mysqli_query($mysqli, $query);
  // var_dump($query);
  // die();
header("location:pemesanan.php");
}


?>