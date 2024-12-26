<?php
include_once('includes/config.php');
// Load the PHPExcel library
require_once('classes/PHPExcel.php');

// Set timezone to avoid warnings
date_default_timezone_set('UTC');
if (isset($_POST['addslot'])) {
    // Check if a file was uploaded
    if ($_FILES['file']['error'] == UPLOAD_ERR_OK && isset($_FILES['file']['tmp_name'])) {
        $path = $_FILES['file']['tmp_name'];
        $reader = PHPExcel_IOFactory::createReader('Excel2007'); // Use the appropriate reader for your Excel version
        $spreadsheet = $reader->load($path);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();
        $count = 0;

        foreach ($data as $row) {
            if ($count > 0) {
                $slot = $row[0];
                $date = $row[1];
                $stime = $row[2];
                $etime = $row[3];

                $studentQuery = "INSERT INTO slots (slot,date,stime,etime) VALUES ('$slot','$date','$stime','$etime')";
                $result = mysqli_query($con, $studentQuery);
            } else {
                $count++;
            }
        }

        if ($result) {
            echo '<script type="text/javascript"> alert("Room(s) added successfully"); </script>';
        } else {
            echo '<script type="text/javascript"> alert("OOPS!! Rooms not added!!!"); </script>';
        }
    } else {
        echo '<script type="text/javascript"> alert("Error uploading the file"); </script>';
    }
}
?>
