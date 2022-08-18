<?php

error_reporting(0);
 
session_start();

if (isset($_SESSION['id_admin'])) {
    header("Location: ../dashboard.php");
}elseif (isset($_SESSION['id_pemesan'])) {
    header("Location: ../dashboard.php");
}elseif (!isset($_SESSION['id_admin'])) {
}else{
    header("Location: login/pemesan.php");
}