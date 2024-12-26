<?php 
    session_start();
    //DB conncetion
    include_once('includes/config.php');
    include_once('addstuxl.php');

    //validating Session
    if (strlen($_SESSION['userid']==0)) {
    header('location:logout.php');
    }
    else
    {
        $usn=$_POST['usn'];
        $name=$_POST['name'];
        $branch=$_POST['branch'];
        $sem=$_POST['sem'];
        if(isset($_POST['add']))
        {
            if($usn==NULL||$name==NULL||$branch==NULL||$sem==NULL)
            {
                echo '<script type="text/javascript"> alert("Please select all the fields"); </script>';
            }
            else
            {
                $checkAvailability=mysqli_query($con,"SELECT * from students where `usn`='$usn'");
                if(mysqli_num_rows($checkAvailability)==0)
                { 
                    $create=mysqli_query($con,"INSERT into students (usn,name,sem ,branch) VALUES ('$usn','$name','$sem','$branch')");
                    if($create)
                    {
                        echo '<script type="text/javascript"> alert("Student added successfully"); </script>';  
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("OOPS! Student not added!!!"); </script>';
                    }
                }
                else
                {
                    echo '<script type="text/javascript"> alert("Student already exist!!!"); </script>';
                }
            }
        }
        if(isset($_POST['delete']))
        {
          $id = $_POST['delete'];
          $del = mysqli_query($con,"delete from students where id = $id");
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

    <title>Add Students</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        label{font-size:16px;font-weight:bold;color:#000;}
        #sb{z-index:1;}
        .mybtn{width:auto;padding:15px; border-radius:5px; margin-left:3px;}
        .logo{height:75px;width:75px;}
        td{text-align:center;}
        .h2{color:red;font-weight:bold; font-size:x-large;}
        #rep{margin:0; position:absolute;z-index:1000; background-color:#fff;}
        .sc{height:32em; overflow-y: scroll;}
        .del{background:#7b3d11; color:white;border:none;border-radius:15px; width:100%;height:150%;}
        .del:hover{background:red;}
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
                    <h1 class="h3 mb-4 text-gray-800">Dashboard > Add Student</h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                        
                                <div class="card-body sc">
                                    <div class="form-group">
                                        <form method="post">
                                            <h4>Enter Student Details</h4><br>
                                            <label>USN: <input name="usn" type="text" placeholder="Enter the Student USN" /></label><br>
                                            <label>Name: <input name="name" type="text" placeholder="Enter the Student name" /></label><br>
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
                                            </label><br>
                                            <label>Tot no. of Students: <input name="totstu" type="text" placeholder="Total No. of Students" /></label><br>
                                            <input type="submit" name="add" value="Add Student" id="add" class="mybtn"/><br>
                                        </form>
                                        <br>
                                        <h4>Upload Excel File Instead</h4>
                                        <form method="POST" enctype="multipart/form-data">
                                            <input type="file" name="file">
                                            <br><br>
                                            <input type="submit" name="addstudent" value="Add Student" class="mybtn"/>
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
                                        <form method="post">
                                            <h4>Existing Students</h4>
                                            <table style="border-collapse: collapse; font-size:x-small;">
                                                <tr><th style="border:1px solid black; padding:10px;">USN</th>
                                                <th style="border:1px solid black; padding:10px;">Name</th>
                                                <th style="border:1px solid black; padding:10px;">Sem</th>
                                                <th style="border:1px solid black; padding:10px;">Branch</th>
                                                <th style="border:1px solid black; padding:10px;">Delete</th></tr>
                                                <?php
                                                    $stu=mysqli_query($con,"SELECT * FROM students");
                                                    while($estu = mysqli_fetch_assoc($stu))
                                                    { 
                                                        echo'<tr> <td style="border:1px solid black; padding:10px;">'.$estu['usn'].'</td>';
                                                        echo'<td style="border:1px solid black; padding:10px;">'.$estu['name'].'</td>';
                                                        echo'<td style="border:1px solid black; padding:10px;">'.$estu['sem'].'</td>';
                                                        echo'<td style="border:1px solid black; padding:10px;">'.$estu['branch'].'</td>';
                                                        echo '<td style="border:1px solid black; padding:10px;"><button name="delete" id="delete" class="del" value="'.$estu['id'].'">Delete</button></td></tr>';
                                                    }
                                                ?>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- /.container-fluid -->
                

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <div style="  position: absolute; left:7%; bottom:0; z-index:0; width:100%;">
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