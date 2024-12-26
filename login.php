<?php
session_start();
include('includes/config.php');

if(isset($_POST['login']))
{ 
    $uname=$_POST['username'];
    $pwd=$_POST['inputpwd'];
    //$cpwd=$_POST['cpass'];
    $sql="SELECT * from users where email='$uname' AND pwd='$pwd' limit 1";
    if(mysqli_error($con))
    echo "<br>Error = ".mysqli_error($con);
    $result=mysqli_query($con,$sql);
    $login=mysqli_num_rows($result)==1&&(!preg_match('/([\'"])/', $_POST['pass']));
    if($login)
    {
        $userinfo=mysqli_fetch_assoc($result);
        $_SESSION['userid']=$userinfo['id'];        
        $_SESSION['name']=$userinfo['name'];
        $_SESSION['user']=$userinfo['desg'];
        if($userinfo['desg']==2)
        {
            header("location:staff.php");
            exit();
        }
        elseif($userinfo['desg']==1)
        {
            header("location:dashboard.php");
            exit();
        }
        else
        {
            header("location:index.php");
            exit();
        }
    } 
    if(!$login)
    {
        echo '<script type="text/javascript"> alert("You Have Entered Incorrect Email/Password !!!"); </script>'; 
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" type="image/x-icon" href="img/ems.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <script src="fullscreen.js"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
 <h3 align="center" style="margin-top:4%;color:#fff">Examination Management System</h3>
                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
<form name="login" method="post">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="img/ems.png" style="width:100%;" />
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" 
                                                id="username" placeholder="Enter username" required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="inputpwd" 
                                                id="inputpwd" placeholder="Password">
                                        </div>
                        <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="login">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="password-recovery.php" style="font-weight:bold">Forgot Password?</a>

                                    </div>

                                         <div class="text-center">
                                        <a class="small" href="index.php" style="font-weight:bold;"><i class="fa fa-home" aria-hidden="true"></i> Home Page</a>
                                    </div>
                        
                                </div>
                            </div>
                        </div>

</form>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>