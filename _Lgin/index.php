<?php
var_dump($_POST['password']);
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['id_admin'])) {
	header("location:admin/index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_admin'] = $row['username'];
		header("location:admin/index.php");
    } else {
        echo "<script>alert('username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="loginBox">
        <img src="user.png" class="user">
        <h2>Login</h2>

        <form action="" method="POST">
            <p>username</p>
            <input type="text" name="username" placeholder="Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="******">
            <input type="submit" value="Sign In">
        </form>

    </div>
</body>
<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');
            return false;
		}
	}
 
</script>

</html>