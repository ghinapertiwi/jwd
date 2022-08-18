<?php

error_reporting(0);
 
session_start();
// cek login atau tidak login
if (isset($_SESSION['id_admin'])) {//cek login sebagai admin
    header("Location: ../dashboard.php");
}elseif (isset($_SESSION['id_pemesan'])) {//cek login sebagai pemesan
    header("Location: ../dashboard.php");
}else{//tidak login
    header("Location: login/pemesan.php");
}