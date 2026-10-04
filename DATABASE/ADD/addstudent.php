<?php
//DECLARATION OF THE VARIABLE-CHECK TABLE AND FORM
$sn=$_POST['studentId']; 
$ln=$_POST['StudentLastname'];
$fn=$_POST['StudentFirstname'];
$c=$_POST['CourseID'];
//Server and database connection 

$servername = "localhost";
$username = "root";// mysql username
$password = "";
$dbname = "student_21";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3308);

// Check connection
if ($conn->connect_error) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
echo "Connected successfully";

//Query statement

$qry="insert into studentinformation (studentId, StudentLastname,StudentFirstname, CourseID)values ($sn,'$ln','$fn','$c')";
//$qry="insert into studentinformation values (1121,'P','r','S','IT')";

if(mysqli_query($conn,$qry)){
	echo "student Sucessfully added <BR>";
	
} else {
	
	echo "error".mysqli_error($conn);
}

mysqli_close($conn);


?>