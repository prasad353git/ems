<?php
 session_start();
 require_once "../includes/config.php";
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
<html>
    <head>
        <title>Consolidated Report</title>
        <link href="style.css" rel="stylesheet">
        <style>
            .mybtn{width:auto;padding:15px; border-radius:5px; margin-left:3px;}
            .logo{height:75px;width:75px;}
            td{text-align:center;}
            .h2{color:red;font-weight:bold; font-size:x-large;}
        </style>
    </head>
    <body>
            <div style="margin-left:2%;margin-top:3%;">
                <div>
                    <table>
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
                    <h5><u>Faculty Duty Allotment for CIE-1 7<sup>th</sup>Sem Nov-2022</u></h5>
                    <span><b>Date:16-11-2022</b></span><br><br>
                    <table style="border-collapse: collapse;">
                        <tr>
                            <th style="border:1px solid black; padding:10px;">Room Number</th>
                            <th style="border:1px solid black; padding:10px;">USN Numbers</th>
                            <th style="border:1px solid black; padding:10px;">No. of Students</th>
                        </tr>
                <?php 
                    $display_allotted=mysqli_query($con,"SELECT `room_num` FROM room ");
                    while($display = mysqli_fetch_assoc($display_allotted))
                    {
                ?>
                <tr>
                <td style="border:1px solid black; padding:10px;">
                    <?php echo $display['room_num']; ?>
            
                </td>
                <td style="border:1px solid black; padding:10px;">
                <?php 
                    $display1=$display['room_num'];
                    $display_usn=mysqli_query($con,"SELECT `usn` FROM students where `room`= '$display1'");
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
                </center><br><br><br>
                <span style="margin-left:15%;">Signature of CIE coordinator</span>
                <span style="margin-left:25%;">Signature of HoD</span><br><br>
            </div>


        <button  onclick="closebtn()" id="printbtn" class="mybtn">Print</button>
        <a href="../dashboard.php" id="bck"><button class="mybtn">Go Back</button></a>


        <script>
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