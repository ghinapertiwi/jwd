<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>validation</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="form">
            <div class="tittle">
                Login User
            </div>

            <form action="" method="post">
                <div class="input_wrap">
                    <label for="input_text">Username</label>
                    <div class="input_field">
                        <input type="text" class="input" id="username" name="username">
                    </div>
                </div>

                <div class="input_wrap">
                    <label for="input_text">Password</label>
                    <div class="input_field">
                        <input type="password" class="input" id="password" name="password">
                    </div>
                </div>

                <div class="input_wrap">
                    <span class="error_msg">Username atau Password salah, ulangi lagi.</span>
                    <input type="submit"onclick="login()" value="Login" class="btn" id="login_btn">
                    
                </div>

            </form>
        </div>
    </div>
        
        <script>
            function login() {
            var username = document.getElementById('username');
            var password = document.getElementById('password');

                if ( username.value == "admin" && password.value == "admin") {
                    alert('Login Berhasil');
                } else {
                    alert('Username atau Password salah, ulangi lagi.');
                }
            }
            
        </script>
</body>

</html>