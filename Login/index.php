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
        <form>
            <p>username</p>
            <input type="text" name="" placeholder="Username">
            <p>Password</p>
            <input type="password" name="" placeholder="******">
            <input type="submit" name="" value="Sign In">
            <a href="#">Forget Password</a>
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