<?php
if (!isset($_SESSION['id_pemesan'])) {
    header("Location: login/pemesan.php");
}elseif (!isset($_SESSION['id_admin'])) {
    header("Location: login/pemesan.php");
}else{
    header("Location: dashboard.php");
}