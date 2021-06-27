<?php
include_once "Login.php";
include_once "User.php";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = $_POST['name'];
    $password = $_POST['password'];
    Login::signUp($name,$password);

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->

        <!-- Login Form -->
        <form method="post">
            <input type="text" class="fadeIn second" name="name" placeholder="login">
            <input type="text" class="fadeIn third" name="password" placeholder="password">
            <button type="submit" name="login">Login</button>
            <a href="registration.php">Register</a>
         <p class="help-block text-danger"> <?php if(isset($_REQUEST['login'])){
                if(!isset($_SESSION['user'])){
                    echo "Sai tài khoản hoặc mật khẩu vui lòng kiểm tra lại ^^";
                }
            }
             ?> </p>
        </form>
    </div>
</div>

</body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</html>
