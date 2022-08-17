<?php
if (isset($_SESSION['id_pemesan'])) {
    header("Location: dashboard.php");
}elseif (isset($_SESSION['id_admin'])) {
    header("Location: dashboard.php");
}else{
    header("Location: login/pemesan.php");
}