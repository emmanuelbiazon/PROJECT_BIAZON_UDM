<?php

$conn = mysqli_connect("localhost", "root", "", "student_21");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT StudentId, StudentFirstname, StudentLastname, CourseID
        FROM studentinformation";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
</head>

<body>

    <h1>Student Information</h1>

    <table border="1">

        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Course</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>

        <tr>
            <td><?php echo $row['StudentId']; ?></td>
            <td><?php echo $row['StudentFirstname']; ?></td>
            <td><?php echo $row['StudentLastname']; ?></td>
            <td><?php echo $row['CourseID']; ?></td>
        </tr>

        <?php
        }
        ?>

    </table>

</body>
</html>

<?php
mysqli_close($conn);
?>