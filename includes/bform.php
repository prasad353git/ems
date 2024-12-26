<?php
 session_start();
 require_once "functions.php";
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
        $sem=$_POST['bsem'];
        $branch=$_POST['bbranch'];
        $room_num=$_POST['floor'].$_POST['room'];
?>
<html>
    <head>
        <title>B-Form</title>
        <link href="style.css" rel="stylesheet">
        <style>
            .mybtn{width:auto;padding:15px; border-radius:5px; margin-left:3px;}
            .logo{height:75px;width:75px;}
            td{text-align:center;}
            .h2{color:red;font-weight:bold; font-size:x-large;}
        </style>
    </head>
    <body>
        <div id="myModal" class="box tabs">

            <h2>B-Form</h2>
            <form method="post">
                <h4>Enter the class</h4>
                <select name="bsem">
                    <option selected disabled>Select Semester</option>
                        <option value="1">1st sem</option>
                        <option value="2">2nd sem</option>
                        <option value="3">3rd sem</option>
                        <option value="4">4th sem</option>
                        <option value="5">5th sem</option>
                        <option value="6">6th sem</option>
                        <option value="7">7th sem</option>
                        <option value="8">8th sem</option>
                    </select><br><br>
                    <select name="bbranch">
                    <option selected disabled>Select Branch</option>
                        <option value="cse">cse</option>
                        <option value="ece">ece</option>
                        <option value="ise">ise</option>
                        <option value="me">me</option>
                </select><br><br>
                <select name="floor">
                    <option selected disabled>Select Floor</option>
                        <option value="L1">L1</option>
                        <option value="L2">L2</option>
                        <option value="L3">L3</option>
                        <option value="L4">L4</option>
                        <option value="L5">L5</option>
                    </select><br><br>
                    <select name="room">
                    <option selected disabled>Select Room</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select><br><br>
                <input type="submit" name="display" value="Display Room" id="disp" class="mybtn" onclick="closetab()" /><br>
            </form>
            <a href="dash.php"><button class="mybtn">Go Back</button></a>
        </div>
        <div id="rep" style="display:none;">
            <div>
                <table>
        <?php
            if(isset($_POST['display']))
            {
                if($sem==NULL||$branch==NULL||$_POST['floor']==NULL||$_POST['room']==NULL)
                {
                    echo '<script type="text/javascript"> alert("Please select all the fields"); </script>';
                }
                else
                {
                    $count=0;
                    echo '<script type="text/javascript">
                    document.getElementById("myModal").style.display = "none";
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
                        <th style="border:1px solid black; padding:10px;">28-10-22<br>(9:30-11:00)</th>
                        <th style="border:1px solid black; padding:10px;">28-10-22<br>(2:00-3:30)</th>
                        <th style="border:1px solid black; padding:10px;">29-10-22<br>(9:30-11:00)</th>
                        <th style="border:1px solid black; padding:10px;">29-10-22<br>(2:00-3:30)</th>
                        <th style="border:1px solid black; padding:10px;">31-10-22<br>(9:30-11:00)</th>
                        <th style="border:1px solid black; padding:10px;">29-10-22<br>(2:00-3:30)</th>
                        <th style="border:1px solid black; padding:10px;">31-10-22<br>(9:30-11:00)</th>
                    </tr>
            <?php
                    $display_allotted=mysqli_query($con,"SELECT * FROM students where `sem`='$sem' and `branch`='$branch' and `room`='$room_num'");
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
                document.getElementById("myModal").style.display = "none";
                document.getElementById("rep").style.display = "block";
                
            }
            function opentab() 
            {
                document.getElementById("myModal").style.display = "block";
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