<?php
 session_start();
 require_once "includes/config.php";
 $con=connect_my_db();

 if(isset($_POST['logout'])) 
 {
     session_destroy();
     header('Location: login.php');
 }
 $auth=mysqli_query($con,"SELECT * FROM users where `id`=".$_SESSION['userid']);
 $name=$_SESSION['name'];
 
 if($auth && mysqli_num_rows($auth)>0)
 {
     $userinfo=mysqli_fetch_assoc($auth);
     
     if($userinfo['desg']==1)
     {  
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Consolidated Report </title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <style type="text/css">
    label{
        font-size:16px;
        font-weight:bold;
        color:#000;
    }
    .mybtn{width:auto;padding:15px; border-radius:5px; margin-left:3px;}
                .logo{height:75px;width:75px;}
                td{text-align:center;}
                .h2{color:red;font-weight:bold; font-size:x-large;}
                #rep{margin:0; position:absolute;z-index:1000; background-color:#fff;}
    </style>
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
        <div id="sb">
        <?php include_once('includes/sidebar.php');?>
        </div>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            <!-- Topbar -->
            <?php include_once('includes/topbar.php');?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid" id="myModal">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Dashboard >Room Report</h1>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Basic Card Example -->
                        <div class="card shadow mb-4">
                    
                            <div class="card-body">
                                <div class="form-group">
                                <form method="post">
                                    <h4>Enter the class</h4>
                                        <label>Slot:
                                            <select name="slot">
                                                <option value="NULL" selected disabled>Select Slot</option>
                                                <?php
                                                    $slot=mysqli_query($con,"SELECT * FROM slots");
                                                    while($eslot = mysqli_fetch_assoc($slot))
                                                    { 
                                                        echo '<option placeholder="Select Slot">'.$eslot['slot'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </label><br>
                                        <label>Branch:
                                            <select name="branch">
                                                <option value="NULL" selected disabled>Select Branch</option>
                                                <?php
                                                    $branch=mysqli_query($con,"SELECT * FROM branches");
                                                    while($ebranch = mysqli_fetch_assoc($branch))
                                                    { 
                                                        echo '<option placeholder="Select Slot">'.$ebranch['branch'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </label><br>
                                        <label>Sem:
                                            <select name="sem">
                                                <option value="NULL" selected disabled>Select Sem</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </label><br><br>
                                        <input type="submit" name="display" value="Display Room" id="disp" class="mybtn" onclick="closetab()" /><br>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <div id="rep" style="display:none;">
        <div>
            <table>
                <?php
                    $slot=$_POST['slot'];
                    $branch=$_POST['branch'];
                    $sem=$_POST['sem'];
                    if(isset($_POST['display']))
                    {
                        if($slot==NULL || $branch==NULL || $sem==NULL)
                        {
                            echo '<script type="text/javascript"> alert("Please select all the fields"); </script>';
                        }
                        else
                        {
                            $count=0;
                            echo '<script type="text/javascript">
                            document.getElementById("myModal").style.display = "none";
                            document.getElementById("sb").style.display = "none";
                            document.getElementById("rep").style.display = "block";
                            </script>';
                        }
                    }
                ?>
                <tr>
                    <td style="margin-top:10px;">
                        <img src="img/rvlogo.png" class="logo">
                    </td>
                    <td style="width:100%;">
                        <span class="h2">RV Institute of Technology and Management<span style="color:#000;"> &#174;</span></span><br>
                        <span style="font-size:small;">
                                (Affiliated to Vishweshwaraya Technological University,Belagavi&Approved by AICTE,New Delhi)<br>
                                Chaitanya Layout,JP Nagar 8<sup>th</sup> Phase,Kothanur,Bengaluru-560076
                        </span>
                    </td>
                </tr>
            </table>
        </div>
        <hr width=90%;>
        <center>
            <span><b>DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING</b></span><br>
            <h5><u>Consolidated Report for CIE-1 5<sup>th</sup>Sem Nov-2022</u></h5>
            <span><b>Date:16-11-2022</b></span><br><br>
            <table style="border-collapse: collapse;">
                <tr>
                    <th style="border:1px solid black; padding:10px;">Room Number</th>
                    <th style="border:1px solid black; padding:10px;">USN Numbers</th>
                    <th style="border:1px solid black; padding:10px;">No. of Students</th>
                </tr>
                <?php 
                    $display_allotted=mysqli_query($con,"SELECT `room` FROM rooms ");
                    while($display = mysqli_fetch_assoc($display_allotted))
                    {
                ?>
                        <tr>
                        <td style="border:1px solid black; padding:10px;">
                            <?php echo $display['room']; ?>
                    
                        </td>
                        <td style="border:1px solid black; padding:10px;">
                        <?php 
                            $display1=$display['room'];
                            $display_usn=mysqli_query($con,"SELECT `usn` FROM students where `$slot`= '$display1' and `branch`='$branch' and `sem`='$sem' ");
                            $usn = mysqli_fetch_assoc($display_usn);
                            echo $usn['usn']."-";
                            $count=0;
                            while($usn = mysqli_fetch_assoc($display_usn))
                            {
                                $usn1=$usn['usn'];
                                $count++;
                            }echo $usn1;$usn1=" ";
                            echo '</td><td style="border:1px solid black; padding:10px;">'.$count. '</td></tr>';
                    } ?>
            </table>
        </center><br><br>
        <span style="margin-left:5%;">Signature of CIE coordinator</span>
        <span style="margin-left:50%;">Signature of HoD</span><br><br>
        <button  onclick="closebtn()" id="printbtn" class="mybtn">Print</button>
        <button  onclick="opentab()" id="bck" class="mybtn">Go Back</button>

        <script>
            function closetab() 
            {
                document.getElementById("sb").style.display = "none";
                document.getElementById("myModal").style.display = "none";
                document.getElementById("rep").style.display = "block";
                
            }
            function opentab() 
            {
                document.getElementById("myModal").style.display = "block";                
                document.getElementById("sb").style.display = "block";
                document.getElementById("rep").style.display = "none";
            }
            function closebtn() 
            {
                document.getElementById("printbtn").style.display = "none";
                document.getElementById("bck").style.display = "none";
                window.print();
                document.getElementById("printbtn").style.display = "block";
                document.getElementById("bck").style.display = "block";
            }
        </script>
        <?php include_once('includes/footer.php');?>

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <?php include_once('includes/footer2.php');?>


        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>
<?php
    }
}  
else
{   
    session_destroy();
    header('Location: login.php');
} 
?>