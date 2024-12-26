<?php
 session_start();
 require_once "includes/config.php";
 if(isset($_POST['logout'])) 
{   
    session_destroy();
    header('Location: login.php');
}

$auth=mysqli_query($con,"SELECT * FROM users where `id`=".$_SESSION['userid']);
$name=$_SESSION['name'];

if($auth && mysqli_num_rows($auth)>0)
{
    $query=mysqli_query($con,"SELECT * from room");
    $room_details=$row = mysqli_fetch_assoc($query);

    $userinfo=mysqli_fetch_assoc($auth);
    
    if($userinfo['desg']==2)
    {               
        if(isset($_POST['allot']))
        {    
            $slot=$_POST['slot'];
            $room_num=$_POST['floor'].$_POST['room'];
            $checkAvailability=mysqli_query($con,"SELECT * from room where `room_num`='$room_num' and `$slot`='0'");
            if(mysqli_num_rows($checkAvailability)>0)
            { 
                $update=mysqli_query($con,"UPDATE `room` SET `$slot` ='$name' WHERE `room_num`='$room_num'");
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
                echo '<script type="text/javascript"> alert("Room is already allotted!!!"); </script>';
            }
        }
        if(isset($_POST['deallot']))
        {    
            $slot=$_POST['slot'];
            $room_num=$_POST['floor'].$_POST['room'];
            $checkAvailability=mysqli_query($con,"SELECT * from room where `room_num`='$room_num' and `$slot`='$name'");
            if(mysqli_num_rows($checkAvailability)>0)
            { 
                $update=mysqli_query($con,"UPDATE `room` SET `$slot` ='0' WHERE `room_num`='$room_num'");
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
<html>
    <head>
        <title>Staff Form</title>
        <link href="style.css" rel="stylesheet">
        <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                    }
                    th{background-color: blueviolet;color:#fff;}
                    th, td {
                    text-align: left;
                    padding: 8px;
                    }

                    tr:nth-child(odd) {background-color: #f2f2f2;}
                    .mybtn{width:auto;padding:15px; border-radius:5px;}
        </style>
    </head>
    <body>            
        <div id="myModal" class="box tabs">
            <h2><?php echo $name; ?></h2>
            <form method="post">
                <h4>Enter the class</h4>
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
                    <select name="slot">
                    <option selected disabled>Select Slot</option>
                        <option value="slot1">Day1-Morining</option>
                        <option value="slot2">Day1-Aftertnoon</option>
                        <option value="slot3">Day2-Morining</option>
                        <option value="slot4">Day2-Aftertnoon</option>
                        <option value="slot5">Day3-Morining</option>
                        <option value="slot6">Day3-Aftertnoon</option>
                        <option value="slot7">Day4-Morining</option>
                    </select><br><br>
                    <input type="submit" name="allot" value="Allot Room" class="mybtn" /><br><br>
                    <input type="submit" name="deallot" value="Deallot Room" class="mybtn" /><br><br><hr>
                </select>
            </form>
            <form method="post">        
                <input type="submit" value="logout" name="logout" class="mybtn right"><br><br>
            </form>
        </div>
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