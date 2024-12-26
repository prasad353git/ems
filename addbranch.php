<?php 
    session_start();
    //DB conncetion
    include_once('includes/config.php');
    include_once('addbranchxl.php');

    //validating Session
    if (strlen($_SESSION['userid']==0)) {
    header('location:logout.php');
    } 
    else
    {
        $branch=$_POST['branch'];
            if(isset($_POST['add']))
            {
                if($branch==NULL)
                {
                    echo '<script type="text/javascript"> alert("Please select all the fields"); </script>';
                }
                else
                {
                    $checkAvailability=mysqli_query($con,"SELECT * from branches where `branch`='$branch'");
                    if(mysqli_num_rows($checkAvailability)==0)
                    { 
                        $create=mysqli_query($con,"INSERT into branches (branch) VALUES ('$branch')");
                        if($create)
                        {
                            echo '<script type="text/javascript"> alert("Branch added successfully"); </script>';  
                        }
                        else
                        {
                            echo '<script type="text/javascript"> alert("OOPS! Branch not added!!!"); </script>';
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Branch already exist!!!"); </script>';
                    }
                }
            }
            if(isset($_POST['delete']))
            {
              $id = $_POST['delete'];
              $del = mysqli_query($con,"delete from branches where id = $id");
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

    <title>Add Branch</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>        
        .sc{height:32em; overflow-y: scroll;}
        .del{background:#7b3d11; color:white;border:none;border-radius:15px; width:100%;height:150%;}
        .del:hover{background:red;}
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
                    <h1 class="h3 mb-4 text-gray-800">Dashboard > Add Branch</h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                        
                                <div class="card-body sc">
                                    <div class="form-group">
                                        <form method="post">
                                            <h4>Enter Branch Details</h4><br>
                                            <label>Branch: <input type="text" name="branch" placeholder="Enter the Branch Name" /></label><br>
                                            <input type="submit" name="add" value="Add Branch" id="add" class="mybtn"/><br>
                                        </form>
                                        <br>
                                        <h4>Upload Excel File Instead</h4>
                                        <form method="POST" enctype="multipart/form-data">
                                            <input type="file" name="file">
                                            <br><br>
                                            <input type="submit" name="addbranch" value="Add Branch" class="mybtn">
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
                                            <h4>Existing Branches</h4>
                                            <table style="border-collapse: collapse; font-size:x-small;">
                                                <tr><th style="border:1px solid black; padding:10px;">Branches</th>
                                                <th style="border:1px solid black; padding:10px;">Delete</th></tr>
                                                <?php
                                                    $branch=mysqli_query($con,"SELECT * FROM branches");
                                                    while($ebranch = mysqli_fetch_assoc($branch))
                                                    { 
                                                        echo'<tr> <td style="border:1px solid black; padding:10px;">'.$ebranch['branch'].'</td>';
                                                        echo '<td style="border:1px solid black; padding:10px;"><button name="delete" id="delete" class="del" value="'.$ebranch['id'].'">Delete</button></td></tr>';
                                                    }
                                                ?>
                                            </table>
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