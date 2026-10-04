<?php


$servername = "localhost";
$username = "root";
$password = "";
$DB = "Student_21";
$port = 3308;


// Get Student ID from the search form
$i = $_POST['StudentId'];

$conn = mysqli_connect($servername, $username,$password, $DB);

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Search for the student
$sql = "SELECT * FROM studentinformation WHERE StudentID = $i";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    // Fetch the student's information
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<html>
<body>

<form action="updatethis2.php" method="POST">

<input type="hidden" name="StudentID" value="<?php echo $row['StudentId']; ?>">

Last Name
<input type="text" name="StudentLastname" value="<?php echo $row['StudentLastname']; ?>"><br>

First Name
<input type="text" name="StudentFirstname" value="<?php echo $row['StudentFirstname']; ?>"><br>

Course ID
<select name="CourseID">
    <option value="IT" <?php if ($row['CourseID'] == 'IT') echo 'selected'; ?>>
        IT - Information Technology
    </option>

    <option value="MK" <?php if ($row['CourseID'] == 'MK') echo 'selected'; ?>>
        MK - Marketing
    </option>

    <option value="FM" <?php if ($row['CourseID'] == 'FM') echo 'selected'; ?>>
        FM - Financial Management
    </option>

    <option value="AC" <?php if ($row['CourseID'] == 'AC') echo 'selected'; ?>>
        AC - Accountancy
    </option>
</select><br>

<input type="submit" value="Update">
<input type="reset">

</form>

</body>
</html>

<?php

} else {
    echo "Student not found.";
}

mysqli_close($conn);

?>