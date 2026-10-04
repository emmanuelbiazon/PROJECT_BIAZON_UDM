<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "Student_21";
$port = 3308;

$conn = mysqli_connect($servername, $username, $password, $DB, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT 
            e.studentID,
            e.subjectID,
            t.tlname AS teacher_lastname
        FROM enrollment e
        JOIN teachers t ON e.tnum = t.tnum
        ORDER BY t.tlname ASC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report 3</title>
</head>
<body>

<h2>Student, Subject and Teacher</h2>

<table border="1">
<tr>
    <th>Student ID</th>
    <th>Subject ID</th>
    <th>Teacher Lastname</th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['studentID']."</td>";
    echo "<td>".$row['subjectID']."</td>";
    echo "<td>".$row['teacher_lastname']."</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>