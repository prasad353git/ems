<?php
include_once('includes/config.php');
// Load the PHPExcel library
require_once('classes/PHPExcel.php');

// Set timezone to avoid warnings
date_default_timezone_set('UTC');
if (isset($_POST['addstudent'])) {
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
                $usn = $row[0];
                $name = $row[1];
                $sem = $row[2];
                $branch = $row[3];

                // Assuming 'usn', 'name', 'sem', and 'branch' are the correct column names in your 'students' table
                $studentQuery = "INSERT INTO students (usn, name, sem, branch) VALUES ('$usn', '$name', '$sem', '$branch')";
                $result = mysqli_query($con, $studentQuery);
            } else {
                $count++;
            }
        }

        if ($result) {
            echo '<script type="text/javascript"> alert("Student(s) added successfully"); </script>';
        } else {
            echo '<script type="text/javascript"> alert("OOPS!! Students not added!!!"); </script>';
        }
    } else {
        echo '<script type="text/javascript"> alert("Error uploading the file"); </script>';
    }
}
?>
