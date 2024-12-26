<?php
session_start();
include_once('includes/config.php');
if (!$_SESSION['userid']==2) {
  header('location:logout.php');
  } 
  else
  {
    $availablerooms="Please select slot";
    $availablestaff="Please select slot";
    $availablestudents="Please select slot";
    $allottedrooms="Please select slot";
    $allottedstaff="Please select slot";
    $allottedstudents="Please select slot";
    $slot=$_POST['slot'];
    if(isset($slot))
    {
        //Total tests
        $query=mysqli_query($con,"select id from room");
        $availablerooms=mysqli_num_rows($query);
        //Assigned tests
        $query1=mysqli_query($con,"select id from users where desg='2'");
        $availablestaff=mysqli_num_rows($query1);
        //On the way for sample collection
        $query2=mysqli_query($con,"select id from students");
        $availablestudents=mysqli_num_rows($query2);
        //Sample Collected
        $query3=mysqli_query($con,"select id from room where not `$slot`='0'");
        $allottedrooms=mysqli_num_rows($query3);
        //Sent for lab
        $query4=mysqli_query($con,"select id from room where not `$slot`='0'");
        $allottedstaff=mysqli_num_rows($query4);
        
        //Report Delivered
        $query5=mysqli_query($con,"select id from students where not `$slot`='0'");
        $allottedstudents=mysqli_num_rows($query5);
    }
    if(isset($_POST['resetall'])){
        $roomreset=mysqli_query($con,"TRUNCATE table room");
        $branchreset=mysqli_query($con,"TRUNCATE table branches");
        $studentreset=mysqli_query($con,"TRUNCATE table students");
        $subjectreset=mysqli_query($con,"TRUNCATE table subjects");
        $slotreset=mysqli_query($con,"TRUNCATE table slots");
        $staffreset=mysqli_query($con,"DELETE FROM `users` WHERE not id = 2");
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

    <title>EMS | Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" style="overflow-x:hidden;">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div style="z-index:1;">
            <?php include_once('includes/sidebar.php');?>
        </div>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <div>     
                        <form method="post">                   
                        <label style="float:right;">Slot: 
                            <select name='slot' onchange='this.form.submit()'>
                                <option placeholder="Select Slot" selected disabled>Select Slot</option>
                                <?php
                                    $slot=mysqli_query($con,"SELECT * FROM slots");
                                    while($eslot = mysqli_fetch_assoc($slot))
                                    { 
                                        echo '<option placeholder="Select Slot">'.$eslot['slot'].'</option>';
                                    }
                                ?>
                            </select>
                            <noscript><input type=”submit” value=”Submit”></noscript>
                        </label><br>
                        </form><label>Selected Slot:</label><?php echo " ".$_POST['slot']; ?>
                    </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">




                        <!-- rooms available-->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                             no. of rooms available</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $availablerooms;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-door-open fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- staffs available-->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                              No. of staffs available</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $availablestaff;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--students available-->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">no. of students available
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $availablestudents;?></div>
                                                </div>
                                                <div class="col">
                                                 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- rooms allotted -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            no. of Rooms Alloted</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $allottedrooms;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-door-closed fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- staffs alloteted-->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">no. of staffs alloted
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $allottedstaff;?></div>
                                                </div>
                                                <div class="col">
                                                 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- students allotted-->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                             no. of Students Allotted</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $allottedstudents;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <!-- Content Row -->

              

             


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- Footer -->
    <div style="  position: absolute; left:6%; bottom:0; z-index:0; width:100%;">
        <?php include_once('includes/footer.php');?>
    </div>
    <!-- End of Footer -->
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php } ?>