<?php 
    session_start();
    //DB conncetion
    include_once('includes/config.php');

    //validating Session
    if (strlen($_SESSION['userid']==0)) {
    header('location:logout.php');
    } 
    else
    {
        $room=$_POST['room'];
        $slot=$_POST['slot'];         
        $name=$_POST['staff'];                   
        if(isset($_POST['allot']))
        {    
            if($_POST['room']=="NULL"||$_POST['slot']=="NULL")
            {
                echo '<script type="text/javascript"> alert("Please select all the fields"); </script>';
            }
            else
            {    
                $checkroom=mysqli_query($con,"SELECT * from rooms where `room`='$room' and `$slot`='0'");
                $checkstaff=mysqli_query($con,"SELECT * FROM rooms where `$slot`='$name'");
                if(mysqli_num_rows($checkroom)>0 && mysqli_num_rows($checkstaff)==0)
                { 
                    $update=mysqli_query($con,"UPDATE `rooms` SET `$slot` ='$name' WHERE `room`='$room'");
                    if($update)
                    {
                        echo '<script type="text/javascript"> alert("Room allotted successfully"); </script>';  
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Room is not allotted"); </script>';
                    }
                }
                else
                {
                    if(mysqli_num_rows($checkroom)==0)
                    {
                        echo '<script type="text/javascript"> alert("Room is already allotted!!!"); </script>';
                    }
                    if(mysqli_num_rows($checkstaff)>0)
                    {
                        echo '<script type="text/javascript"> alert("Staff is already allotted!!!"); </script>';
                    }
                }
            }
        }
        if(isset($_POST['deallot']))
        {    
            $slot=$_POST['slot'];
            $room=$_POST['room'];
            $checkAvailability=mysqli_query($con,"SELECT * from rooms where `room`='$room' and `$slot`='$name'");
            if(mysqli_num_rows($checkAvailability)>0)
            { 
                $update=mysqli_query($con,"UPDATE `rooms` SET `$slot` ='0' WHERE `room`='$room'");
                if($update)
                {
                    echo '<script type="text/javascript"> alert("Room Deallotted successfully"); </script>';
                }
                else
                {
                    echo '<script type="text/javascript"> alert("Room is not Deallotted "); </script>';
                }
            }
            else
            {
                echo '<script type="text/javascript"> alert("Room is not yet allotted "); </script>';
            }
        } 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>allot Room</title>

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
        .sc{height:32em; overflow-y: scroll;}
</style>
</head>

<body id="page-top">

     <!-- Page Wrapper -->
     <div id="wrapper">
    <!-- Sidebar -->
    <div style="z-index:1;">
    <div id="sb">
            <?php include_once('includes/sidebar.php');?>
        </div>
        <!-- End of Sidebar -->
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
                    <h1 class="h3 mb-4 text-gray-800">Dashboard > Allot Staff</h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                        
                                <div class="card-body sc">
                                    <div class="form-group">
                                        <form method="post">
                                            <h4>Enter Staff Allottment Details</h4><br>
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
                                            <label>Room:
                                                <select name="room">
                                                    <option value="NULL" selected disabled>Select Room</option>
                                                    <?php
                                                        $room=mysqli_query($con,"SELECT * FROM rooms");
                                                        while($eroom = mysqli_fetch_assoc($room))
                                                        { 
                                                            echo '<option placeholder="Select Slot">'.$eroom['room'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </label><br>
                                            <label>Staff:
                                                <select name="staff">
                                                    <option value="NULL" selected disabled>Select Staff</option>
                                                    <?php
                                                        $staff=mysqli_query($con,"SELECT * FROM users where `desg`=2");
                                                        while($estaff = mysqli_fetch_assoc($staff))
                                                        { 
                                                            echo '<option placeholder="Select Slot">'.$estaff['name'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </label><br><br>
                                            <input type="submit" name="allot" value="Allot Staff" id="allot" class="mybtn" /><br><br>
                                            <input type="submit" name="deallot" value="Deallot Staff" id="deallot" class="mybtn" /><br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-lg-6">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                        
                                <div class="card-body sc">
                                    <div class="form-group">
                                        <h4>Allotted Staffs</h4>   
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
                                                <noscript><input type="submit" value="Submit"></noscript>
                                            </label><br>
                                            </form><label>Selected Slot:</label><?php echo " ".$_POST['slot']; ?>
                                        </div><br>
                                        <?php
                                            $slot=$_POST['slot'];
                                            if(isset($slot))
                                            {

                                        ?>
                                                <table style="border-collapse: collapse; font-size:x-small;">
                                                    <th style="border:1px solid black; padding:10px;">Staffs Allotted</th>
                                                    <?php
                                                        $room=mysqli_query($con,"SELECT * FROM rooms where not `$slot`='0'");
                                                        while($eroom = mysqli_fetch_assoc($room))
                                                        { 
                                                            $slot_checks=$eroom[$slot];
                                                            $staff_name=mysqli_query($con,"SELECT * FROM users where `name`='$slot_checks'");
                                                            while($estaff_name = mysqli_fetch_assoc($staff_name))
                                                            { 
                                                                $estaff_names=$estaff_name['name'];
                                                            }
                                                            echo'<tr> <td style="border:1px solid black; padding:10px;">'.$estaff_names.'</td></tr>';
                                                        }
                                                    ?>
                                                </table>
                                        <?php 
                                            } 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- /.container-fluid -->
                

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <div style="  position: absolute; left:6%; bottom:0; z-index:0; width:100%;">
                <?php include_once('includes/footer.php');?>
            </div>
            <!-- End of Footer -->

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
<?php } ?>