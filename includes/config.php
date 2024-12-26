<?php
error_reporting(0);     
//time zone
date_default_timezone_set('Asia/Kolkata');
function connect_my_db()
{
    $host="localhost";
    $user="root";
    $password="12345678";
    $db="ems";
    $con=mysqli_connect($host,$user,$password,$db) or die("Sorry unable to connect");
    return $con;
}
$con=connect_my_db();
?>