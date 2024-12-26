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

    <title>Room Report </title>

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
                        $room=$_POST['room'];
                        if(isset($_POST['display']))
                        {
                            if($_POST['slot']==NULL || $_POST['room']==NULL)
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
                <span><b>ROOM REPORT</b></span><br>
                <span>Academic:Year2022-23(ODD Semester)</span><br>
                <span>Semester:<?php echo $sem; ?>
                       &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                       <u>CIE-1</u>
                       &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                       Room No:<?php echo $room; ?> 
                </span>

<?php
    // Reset the 'report' column to 0
    mysqli_query($con, "UPDATE students SET report=0");

    // Count the number of students in each branch and store in descending order
    $branch_counts = array();
    $branches_query = mysqli_query($con, "SELECT DISTINCT branch FROM students");
    while ($branch_row = mysqli_fetch_assoc($branches_query)) {
        $branch = $branch_row['branch'];
        $count_query = mysqli_query($con, "SELECT COUNT(*) AS count FROM students WHERE branch='$branch' and `$slot`='$room' ");
        $count_row = mysqli_fetch_assoc($count_query);
        $branch_counts[$branch] = $count_row['count'];
    }

    arsort($branch_counts); // Sort in descending order

    // Create the 6x6 table structure
    $table = array();
    for ($col = 0; $col < 11; $col++) {
        $table[] = array();
    }

    $prev_branch = null;

    for ($col = 0; $col < 11; $col++) {
        // Check if it's an odd column (filled column)
        $is_filled = $col % 2 == 0;

        if ($is_filled) {
            for ($row = 0; $row < 6; $row++) {
                // Find a branch with unallocated students and not the same as the previous column
                $selected_branch = null;

                foreach ($branch_counts as $branch => $count) {
                    if ($count > 0 && $branch != $prev_branch) {
                        $selected_branch = $branch;
                        break; // Stop when a suitable branch is found
                    }
                }

                // If no suitable branch is found, choose a branch different from the previous column
                if ($selected_branch === null) {
                    foreach ($branch_counts as $branch => $count) {
                        if ($count > 0 && $branch != $prev_branch) {
                            $selected_branch = $branch;
                            break;
                        }
                    }
                }

                // Allocate a student from the chosen branch
                if ($selected_branch !== null) {
                    $allocation_query = mysqli_query($con, "SELECT usn FROM students WHERE branch='$selected_branch' and `$slot`='$room' AND report=0 LIMIT 1");
                    $allocation_row = mysqli_fetch_assoc($allocation_query);
                    $usn = $allocation_row['usn'];

                    if (!empty($usn)) {
                        $table[$col][$row] = $usn;
                        // Mark the student as allocated
                        mysqli_query($con, "UPDATE students SET report=1 WHERE usn='$usn'");
                        $branch_counts[$selected_branch]--;
                    } else {
                        $table[$col][$row] = "";
                    }
                } else {
                    for ($r = $row; $r < 6; $r++) {
                        $table[$col][$r] = "";
                    }
                    break; // Exit the row loop when no branch is available
                }
            }
            $prev_branch = $selected_branch;
        } else {
            for ($row = 0; $row < 6; $row++) {
                $table[$col][$row] = "";
            }
        }
    }

    // Output the 6x6 table with empty columns
    echo "<table border='1'>";
    for ($row = 0; $row < 6; $row++) {
        echo "<tr>";
        for ($col = 0; $col < 11; $col++) {
            if ($col == 3 && $row ==0 || $col == 7 && $row ==0 ) {
                // Combine all 6 rows in columns 3 and 7 (0 index based)
                echo "<td rowspan='6' style='width: 25px;'></td>";
            } elseif ($col == 3|| $col == 7) {
                echo " ";
            }elseif (empty($table[$col][$row])) {
                echo "<td style='width: 50px;'></td>";
            } else {
                echo "<td>" . $table[$col][$row] . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
?>





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