<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_21";

$sn = $_POST['studentId'];

$conn = mysqli_connect("localhost", "root", "", "student_21", 3308);

$qry = "DELETE FROM studentinformation WHERE studentId = $sn";

if (mysqli_query($conn, $qry)) {
    echo "Student Removed successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

echo '<br><a href="Display.php">SEE TABLE</a><br>';
echo '<a href="addstudent.html">ADD ANOTHER STUDENT</a><br>';

mysqli_close($conn);


?>

