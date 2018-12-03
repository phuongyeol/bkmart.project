<?php ob_start(); ?>
<?php 
    // session_start();
    session_destroy();
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | BKMart</title>
    <!-- Favicon-->
    <link rel="icon" href="public/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="public/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="public/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="public/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>BKMart</b></a>
            <small>Login page - Siêu thị mini</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="?mod=staff&act=login"> 
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Your email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="login">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="#">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
     <script src="public/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
     <script src="public/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
     <script src="public/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
     <script src="public/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
     <script src="public/js/admin.js"></script>
     <script src="public/js/pages/examples/sign-in.js"></script>

 <?php
    if(isset($_POST["login"])&&isset($_POST["email"]))
    {   
        $_SESSION['username'] = $_POST["email"];   
        //Ket noi den MySQL
        $con=mysqli_connect("localhost","root","","bkmart.project") or die("Khong the ket noi den Server");
        //Chon CSDL qlbanhang
        mysqli_select_db($con,"bkmart.project") or die("khong ket noi CSDL duoc");
        //Chon bang ma la unicode utf-8
        mysqli_query($con,"set names 'utf8'");
        $md5pass = md5($_POST['password']);
        //Thuc hien cau truy van
        $query="select * from staffs where email='" . $_POST['email'] . "' And password='" . $md5pass . "'";
        $result=mysqli_query($con,$query);

        if(mysqli_num_rows($result)>0)
        {
            //Dang nhap thanh cong luu ten sinh vien vao session
            $row = mysqli_fetch_row($result);
            $_SESSION["password"]=$password;
            $_SESSION["email"]=$email;
            // header('Location:lab9_1.php');
        }
        else
            {
            echo "<div align=center >Đăng nhập không thành công!<div>";
            }
            mysqli_close($con);
        }
?> 
</body>

</html>
<?php ob_flush(); ?>