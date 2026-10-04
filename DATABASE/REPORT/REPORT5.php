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
            t.tnum AS teacherID,
            t.tlname AS teacher_lastname,
            si.studentID,
            si.studentlastname
        FROM enrollment e
        JOIN teachers t 
            ON e.tnum = t.tnum
        JOIN studentInformation si 
            ON e.studentID = si.studentID
        WHERE e.subjectID = 'ICT01'
        ORDER BY si.studentlastname ASC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report 5</title>
</head>
<body>

<h2>Class List - ICT01</h2>

<table border="1">
<tr>
    <th>Teacher ID</th>
    <th>Teacher Lastname</th>
    <th>Student ID</th>
    <th>Student Lastname</th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['teacherID']) . "</td>";
    echo "<td>" . htmlspecialchars($row['teacher_lastname']) . "</td>";
    echo "<td>" . htmlspecialchars($row['studentID']) . "</td>";
    echo "<td>" . htmlspecialchars($row['studentlastname']) . "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>

<?php
mysqli_close($conn);
?>
