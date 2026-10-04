<?php

$servername = "localhost";
$username = "root";
$password = "";
$DB = "Student_21";
$port = 3308;

// Get the updated information from the form
$studentID = $_POST['StudentID'];
$lastname = $_POST['StudentLastname'];
$firstname = $_POST['StudentFirstname'];
$courseID = $_POST['CourseID'];

$conn = mysqli_connect($servername, $username, $password, $DB);

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Update the student's information
$sql = "UPDATE studentinformation
        SET StudentLastname = '$lastname',
            StudentFirstname = '$firstname',
            CourseID = '$courseID'
        WHERE StudentID = $studentID";

if (mysqli_query($conn, $sql)) {

    echo "Student information updated successfully.<br><br>";

    echo "Student ID: $studentID<br>";
    echo "Last Name: $lastname<br>";
    echo "First Name: $firstname<br>";
    echo "Course ID: $courseID<br><br>";

    echo "<a href='updatesearch.html'>Update another student</a>";

} else {

    echo "Error updating student information: " . mysqli_error($conn);

}

mysqli_close($conn);

?>