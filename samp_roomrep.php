
<?php
    // Fetch CS and ME student registration numbers from the database
    $branch=mysqli_query($con,"SELECT * FROM branches");
    while($ebranch = mysqli_fetch_assoc($branch))
    { 
        $branches=$ebranch['branch'];
        $sql = "SELECT usn FROM students WHERE branch='$branches'";
        $result = mysqli_query($con, $sql);
        $reg_numbers = array();
        while($row = mysqli_fetch_assoc($result)) {
            $reg_numbers[] = $row['usn'];
        }

        // Create the HTML table
        echo "<table border='1'>";

        // Populate the table with the student registration numbers
        $count = 0;
        foreach ($reg_numbers as $reg_num) {
            echo "<td>" . $reg_num . "</td>";
            $count++;
        }
    }

    // Close the HTML table
    echo "</table>";
?>
--------------------------------------------------------------------------------------------------------------------------------------------------------









<?php
// Create the 'report' column with a default value of 0
mysqli_query($con, "ALTER TABLE students ADD COLUMN report INT DEFAULT 0");

// Count the number of students in each branch
$branch_counts = array();
$branches_query = mysqli_query($con, "SELECT DISTINCT branch FROM students");
while ($branch_row = mysqli_fetch_assoc($branches_query)) {
    $branch = $branch_row['branch'];
    $count_query = mysqli_query($con, "SELECT COUNT(*) AS count FROM students WHERE branch='$branch'");
    $count_row = mysqli_fetch_assoc($count_query);
    $branch_counts[$branch] = $count_row['count'];
}

// Create the 6x6 table
echo "<table border='1'>";

// Initialize the column counter and previous branch
$column_counter = 0;
$prev_branch = null;

for ($row = 0; $row < 6; $row++) {
    echo "<tr>";
    for ($col = 0; $col < 6; $col++) {
        // Find the branch with the most unallocated students
        $max_branch = null;
        $max_count = -1;

        foreach ($branch_counts as $branch => $count) {
            if ($count > $max_count && $branch != $prev_branch) {
                $max_count = $count;
                $max_branch = $branch;
            }
        }

        // Allocate a student from the chosen branch
        if ($max_branch !== null) {
            $allocation_query = mysqli_query($con, "SELECT usn FROM students WHERE branch='$max_branch' AND report=0 LIMIT 1");
            $allocation_row = mysqli_fetch_assoc($allocation_query);
            $usn = $allocation_row['usn'];

            if (!empty($usn)) {
                echo "<td>$usn</td>";
                // Mark the student as allocated
                mysqli_query($con, "UPDATE students SET report=1 WHERE usn='$usn'");
                $branch_counts[$max_branch]--;
                $prev_branch = $max_branch;
            } else {
                echo "<td></td>"; // Empty cell
            }
        } else {
            echo "<td></td>"; // Empty cell
        }
    }
    echo "</tr>";
}

// Close the HTML table
echo "</table>";

// Remove the 'report' column
mysqli_query($con, "ALTER TABLE students DROP COLUMN report");
?>


-----------------------------------------------------------------------------------------------------------------------------------------------------------

<?php
// Create the 'report' column with a default value of 0
mysqli_query($con, "ALTER TABLE students ADD COLUMN report INT DEFAULT 0");

// Count the number of students in each branch
$branch_counts = array();
$branches_query = mysqli_query($con, "SELECT DISTINCT branch FROM students");
while ($branch_row = mysqli_fetch_assoc($branches_query)) {
    $branch = $branch_row['branch'];
    $count_query = mysqli_query($con, "SELECT COUNT(*) AS count FROM students WHERE branch='$branch'");
    $count_row = mysqli_fetch_assoc($count_query);
    $branch_counts[$branch] = $count_row['count'];
}

// Create the 6x6 table
echo "<table border='1'>";

// Initialize the column counter
$column_counter = 0;

for ($row = 0; $row < 6; $row++) {
    echo "<tr>";
    for ($col = 0; $col < 6; $col++) {
        // Find a branch with unallocated students
        $selected_branch = null;

        foreach ($branch_counts as $branch => $count) {
            if ($count > 0 && $branch != $prev_branch) {
                $selected_branch = $branch;
                break; // Stop when a suitable branch is found
            }
        }

        // Allocate a student from the chosen branch
        if ($selected_branch !== null) {
            $allocation_query = mysqli_query($con, "SELECT usn FROM students WHERE branch='$selected_branch' AND report=0 LIMIT 1");
            $allocation_row = mysqli_fetch_assoc($allocation_query);
            $usn = $allocation_row['usn'];

            if (!empty($usn)) {
                echo "<td>$usn</td>";
                // Mark the student as allocated
                mysqli_query($con, "UPDATE students SET report=1 WHERE usn='$usn'");
                $branch_counts[$selected_branch]--;
                $prev_branch = $selected_branch;
            } else {
                echo "<td></td>"; // Empty cell
            }
        } else {
            echo "<td></td>"; // Empty cell
        }
    }
    echo "</tr>";
}

// Close the HTML table
echo "</table>";

// Remove the 'report' column
mysqli_query($con, "ALTER TABLE students DROP COLUMN report");
?>

---------------------------------------------------------------------------------------------------------------------------------------------------------




<?php
    // Create the 'report' column with a default value of 0
    mysqli_query($con, "ALTER TABLE students ADD COLUMN report INT DEFAULT 0");

    // Count the number of students in each branch
    $branch_counts = array();
    $branches_query = mysqli_query($con, "SELECT DISTINCT branch FROM students");
    while ($branch_row = mysqli_fetch_assoc($branches_query)) {
        $branch = $branch_row['branch'];
        $count_query = mysqli_query($con, "SELECT COUNT(*) AS count FROM students WHERE branch='$branch'");
        $count_row = mysqli_fetch_assoc($count_query);
        $branch_counts[$branch] = $count_row['count'];
    }

    // Create the 6x6 table
    echo "<table border='1'>";

    // Initialize the column counter
    $column_counter = 0;
    $prev_branch = null;

    for ($col = 0; $col < 6; $col++) {
        echo "<tr>";
        for ($row = 0; $row < 6; $row++) {
            // Find a branch with unallocated students
            $selected_branch = null;

            foreach ($branch_counts as $branch => $count) {
                if ($count > 0 && $branch != $prev_branch) {
                    $selected_branch = $branch;
                    break; // Stop when a suitable branch is found
                }
            }

            // Allocate a student from the chosen branch
            if ($selected_branch !== null) {
                $allocation_query = mysqli_query($con, "SELECT usn FROM students WHERE branch='$selected_branch' AND report=0 LIMIT 1");
                $allocation_row = mysqli_fetch_assoc($allocation_query);
                $usn = $allocation_row['usn'];

                if (!empty($usn)) {
                    echo "<td>$usn</td>";
                    // Mark the student as allocated
                    mysqli_query($con, "UPDATE students SET report=1 WHERE usn='$usn'");
                    $branch_counts[$selected_branch]--;
                    $prev_branch = $selected_branch;
                } else {
                    echo "<td></td>"; // Empty cell
                }
            } else {
                echo "<td></td>"; // Empty cell
            }
        }
        echo "</tr>";
    }

    // Close the HTML table
    echo "</table>";

    // Remove the 'report' column
    mysqli_query($con, "ALTER TABLE students DROP COLUMN report");
?>

-------------------------------------------------------------------------------------------------------------------------------------------------------------
<?php
// Create the 'report' column with a default value of 0
mysqli_query($con, "ALTER TABLE students ADD COLUMN report INT DEFAULT 0");

// Count the number of students in each branch
$branch_counts = array();
$branches_query = mysqli_query($con, "SELECT DISTINCT branch FROM students");
while ($branch_row = mysqli_fetch_assoc($branches_query)) {
    $branch = $branch_row['branch'];
    $count_query = mysqli_query($con, "SELECT COUNT(*) AS count FROM students WHERE branch='$branch'");
    $count_row = mysqli_fetch_assoc($count_query);
    $branch_counts[$branch] = $count_row['count'];
}

// Create the 6x6 table structure
$table = array();
for ($col = 0; $col < 6; $col++) {
    $table[] = array();
}

$prev_branch = null;

for ($col = 0; $col < 6; $col++) {
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
            $allocation_query = mysqli_query($con, "SELECT usn FROM students WHERE branch='$selected_branch' AND report=0 LIMIT 1");
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
}

// Output the 6x6 table
echo "<table border='1'>";
for ($row = 0; $row < 6; $row++) {
    echo "<tr>";
    for ($col = 0; $col < 6; $col++) {
        echo "<td>" . $table[$col][$row] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

// Remove the 'report' column
mysqli_query($con, "ALTER TABLE students DROP COLUMN report");
?>

---------------------PROPER-START-----------------------------------------------------------------------------------------------------------------------------

<?php
// Create the 'report' column with a default value of 0
mysqli_query($con, "ALTER TABLE students ADD COLUMN report INT DEFAULT 0");

// Count the number of students in each branch and store in descending order
$branch_counts = array();
$branches_query = mysqli_query($con, "SELECT DISTINCT branch FROM students");
while ($branch_row = mysqli_fetch_assoc($branches_query)) {
    $branch = $branch_row['branch'];
    $count_query = mysqli_query($con, "SELECT COUNT(*) AS count FROM students WHERE branch='$branch'");
    $count_row = mysqli_fetch_assoc($count_query);
    $branch_counts[$branch] = $count_row['count'];
}

arsort($branch_counts); // Sort in descending order

// Create the 6x6 table structure
$table = array();
for ($col = 0; $col < 6; $col++) {
    $table[] = array();
}

$prev_branch = null;

for ($col = 0; $col < 6; $col++) {
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
            $allocation_query = mysqli_query($con, "SELECT usn FROM students WHERE branch='$selected_branch' AND report=0 LIMIT 1");
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
}

// Output the 6x6 table
echo "<table border='1'>";
for ($row = 0; $row < 6; $row++) {
    echo "<tr>";
    for ($col = 0; $col < 6; $col++) {
        echo "<td>" . $table[$col][$row] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

// Remove the 'report' column
mysqli_query($con, "ALTER TABLE students DROP COLUMN report");
?>
---------------------------PROPER-END---------------------------------------------------------------------------------------------------------------------------


------------------------PROPER-WITH-EMPTY-COLUMN-START------------------------------------------------------------------------------------------------------------
<?php
// Reset the 'report' column to 0
mysqli_query($con, "UPDATE students SET report=0");

// Count the number of students in each branch and store in descending order
$branch_counts = array();
$branches_query = mysqli_query($con, "SELECT DISTINCT branch FROM students");
while ($branch_row = mysqli_fetch_assoc($branches_query)) {
    $branch = $branch_row['branch'];
    $count_query = mysqli_query($con, "SELECT COUNT(*) AS count FROM students WHERE branch='$branch'");
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
                $allocation_query = mysqli_query($con, "SELECT usn FROM students WHERE branch='$selected_branch' AND report=0 LIMIT 1");
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
        if (empty($table[$col][$row])) {
            echo "<td style='width: 50px;'></td>";
        } else {
            echo "<td>" . $table[$col][$row] . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
?>

---------------------------PROPER-WITH-EMPTY-COLUMN-END----------------------------------------------------------------------------------------------------------

---------------------------PROPER-COMPLETED-START----------------------------------------------------------------------------------------------------------------
<?php
    // Reset the 'report' column to 0
    mysqli_query($con, "UPDATE students SET report=0");

    // Count the number of students in each branch and store in descending order
    $branch_counts = array();
    $branches_query = mysqli_query($con, "SELECT DISTINCT branch FROM students");
    while ($branch_row = mysqli_fetch_assoc($branches_query)) {
        $branch = $branch_row['branch'];
        $count_query = mysqli_query($con, "SELECT COUNT(*) AS count FROM students WHERE branch='$branch'");
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
                    $allocation_query = mysqli_query($con, "SELECT usn FROM students WHERE branch='$selected_branch' AND report=0 LIMIT 1");
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
                // Combine all 6 rows in columns 3 and 7 (0 index based) using colspan
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
---------------------------PROPER-COMPLETED-END-----------------------------------------------------------------------------------------------------------------