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
        $result=mysqli_query($con,"SELECT * FROM room");
?>
<html>
    <head>
        <title>Faculty Report</title>
        <link href="style.css" rel="stylesheet">
        <style>
            .mybtn{width:auto;padding:15px; border-radius:5px; margin-left:3px;}
            .logo{height:100px;width:100px;}
            td{text-align:center;}
            h2{color:red;}
        </style>
    </head>
    <body>
        <header>
            <div style="margin-left:2%;margin-top:3%;">
                <table>
                    <tr>
                        <td style="margin-top:10px;">
                            <img src="img/rvlogo.png" class="logo">
                        </td>
                        <td style="width:100%;">
                            <h2>RV Institute of Technology and Management<span style="color:#000;"> &#174;</span></h2>
                            <h3>(Affiliated to Vishweshwaraya Technological University,Belagavi&Approved by AICTE,New Delhi)<br>
                                Chaitanya Layout,JP Nagar 8<sup>th</sup> Phase,Kothanur,Bengaluru-560076<br>
                                Department of Computer Science and Engineering
                            </h3>                            
                        </td>
                    </tr>
                </table>
            </div>
            <hr width=90%;>
            <center>
                <span><b>DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING</b></span><br>
                <h5><u>Faculty Duty Allotment for CIE-1 7<sup>th</sup>Sem Nov-2022</u></h5>
                <span><b>Date:16-11-2022</b></span><br><br>
                <table style="border-collapse: collapse; font-size:x-small;">
                    <tr>
                        <th rowspan="2" style="border:1px solid black; padding:10px;">Faculty</th>
                        <th rowspan="2" style="border:1px solid black; padding:10px;">Signature</th>
                        <th colspan="2" style="border:1px solid black; padding:10px;">21-11-2022</th>
                        <th colspan="2" style="border:1px solid black; padding:10px;">22-11-2022</th>
                        <th colspan="2" style="border:1px solid black; padding:10px;">23-11-2022</th>
                        <th style="border:1px solid black; padding:10px;">24-11-2022</th>
                    </tr>
                    <tr>
                        <td style="border:1px solid black; padding:10px;">Morning Session<br>(9:30-11:00)</td>
                        <td style="border:1px solid black; padding:10px;">AfterNoon Session<br>(2:00-3:30)</td>
                        <td style="border:1px solid black; padding:10px;">Morning Session<br>(9:30-11:00)</td>
                        <td style="border:1px solid black; padding:10px;">AfterNoon Session<br>(2:00-3:30)</td>
                        <td style="border:1px solid black; padding:10px;">Morning Session<br>(9:30-11:00)</td>
                        <td style="border:1px solid black; padding:10px;">AfterNoon Session<br>(2:00-3:30)</td>
                        <td style="border:1px solid black; padding:10px;">Morning Session<br>(9:30-11:00)</td>
                    </tr>
            <?php
                $fac=mysqli_query($con,"SELECT * FROM users where `desg`='2'");
                while($facs = mysqli_fetch_assoc($fac))
                { 
            ?>
                    <tr>
                        <td style="border:1px solid black; padding:10px;"><?php echo $facs['name'];?></td>
                        <td style="border:1px solid black; padding:10px;"></td>
                <?php
                    $name=$facs['name'];
                    $slot=mysqli_query($con,"SELECT * FROM room ");
                    $count=0;
                    while($slots = mysqli_fetch_assoc($slot)&&$count<7)
                    { $count++;
                        if($slots=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room where `slot".$count."`='$name'")))
                        {
                ?>
                        <td style="border:1px solid black; padding:10px;"><?php echo $slots['room_num'];?></td>
                <?php 
                        }
                        else
                        { echo '<td style="border:1px solid black; padding:10px;"></td>'; }
                    }
                ?>
        <?php 
                }
        ?>
                </table><br>
                <span>Note : Invigilators are requested to report 10 mins before the test starts</span>
            </center><br><br><br>
            <span style="margin-left:75%;">Signatureof HoD</span>
        </header>


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