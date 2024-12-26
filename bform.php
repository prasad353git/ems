<?php 
    session_start();
    //DB conncetion
    include_once('includes/config.php');

    //validating Session
    if (strlen($_SESSION['userid']==0)) {
    header('location:logout.php');
    } else{
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>B-form</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Dashboard > B-Form</h1>
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
        $sem=$_POST['sem'];
        $branch=$_POST['branch'];
        $room=$_POST['room'];
            if(isset($_POST['display']))
            {
                if($sem=="NULL"||$branch=="NULL"||$_POST['room']=="NULL")
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
                                    Chaitanya Layout,JP Nagar 8<sup>th</sup> Phase,Kothanur,Bengaluru-560076<br>
                                    Department of Computer Science and Engineering
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
            <hr width=90%;>
            <center>
                <span><b>TEST ATTENDENCE REPORT</b></span><br>
                <span>Academic:Year2022-23(ODD Semester)</span><br>
                <span>Semester:<?php echo $sem; ?>
                       &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                       <u>CIE-1</u>
                       &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                       Room No:<?php echo $_POST['floor']."-".$_POST['room']; ?> 
                </span>
                <table style="border-collapse: collapse; font-size:x-small;">
                    <tr>
                        <th rowspan="2" style="border:1px solid black; padding:10px;">Sl no</th>
                        <th rowspan="2" style="border:1px solid black; padding:10px;">USN</th>
                        <th rowspan="2" style="border:1px solid black; padding:10px;">Name</th>
                    <?php
                        $sub=mysqli_query($con,"SELECT * FROM subjects where `sem`='$sem' and `branch`='$branch' ");
                        while($subs = mysqli_fetch_assoc($sub))
                        { 
                          echo' <th style="border:1px solid black; padding:10px;">'.$subs['subject'].'</th>';
                        }
                    ?>
                    </tr>
                    <tr>
                    <?php
                        $sub=mysqli_query($con,"SELECT * FROM subjects where `sem`='$sem' and `branch`='$branch' ");
                        while($subs = mysqli_fetch_assoc($sub))
                        { 
                          echo' <th style="border:1px solid black; padding:10px;">'.$subs['code'].'</th>';
                        }
                    ?>
                    </tr>
                    <tr>
                        <th colspan="3" style="border:1px solid black; padding:10px;">Date of Test</th>
                        <?php
                            $slot=mysqli_query($con,"SELECT * FROM slots");
                            while($eslot = mysqli_fetch_assoc($slot))
                            { 
                                echo' <th style="border:1px solid black; padding:10px;">'.$eslot['date'].'<br>('.$eslot['stime'].'-'.$eslot['etime'].')</th>';
                            }
                        ?>
                    </tr>
            <?php
                    $display_allotted=mysqli_query($con,"SELECT * FROM students where `sem`='$sem' and `branch`='$branch'");
                    while($display = mysqli_fetch_assoc($display_allotted))
                    { 
                        $count++;
            ?>
                    <tr>
                        <th style="border:1px solid black; padding:10px;"><?php echo $count;?></th>
                        <td style="border:1px solid black; padding:10px;"><?php echo $display['usn'];?></td>
                        <td style="border:1px solid black; padding:10px;"><?php echo $display['name'];?></td>
                        <td style="border:1px solid black; padding:10px;"></td>
                        <td style="border:1px solid black; padding:10px;"></td>
                        <td style="border:1px solid black; padding:10px;"></td>
                        <td style="border:1px solid black; padding:10px;"></td>
                        <td style="border:1px solid black; padding:10px;"></td>
                        <td style="border:1px solid black; padding:10px;"></td>
                        <td style="border:1px solid black; padding:10px;"></td>
                    </tr>
        <?php 
                    }
        ?>
                </table>
            </center><br><br>
            <span style="margin-left:5%;">Signature of CIE coordinator</span>
            <span style="margin-left:50%;">Signature of HoD</span><br><br>
            <button  onclick="closebtn()" id="printbtn" class="mybtn">Print</button>
            <button  onclick="opentab()" id="bck" class="mybtn">Go Back</button>
        </div>


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
<?php } ?>