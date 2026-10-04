<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "student_21";
$port = 3308;

$conn = mysqli_connect($servername, $username, $password, $DB, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT 
            e.StudentID,
            si.StudentLastname,
            GROUP_CONCAT(
                e.SubjectID 
                ORDER BY e.SubjectID 
                SEPARATOR ', '
            ) AS SubjectID,
            SUM(sub.units) AS total_units
        FROM enrollment e
        JOIN studentInformation si 
            ON e.StudentID = si.studentid
        JOIN subject sub 
            ON e.SubjectID = sub.SubjectID
        GROUP BY e.StudentID, si.StudentLastname
        ORDER BY si.StudentLastname ASC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report 2</title>
</head>
<body>

<h2>Total Units Enrolled Per Student</h2>

<table border="1">
    <tr>
        <th>Student ID</th>
        <th>Student Lastname</th>
        <th>Subject ID</th>
        <th>Total Units</th>
    </tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['StudentID']) . "</td>";
    echo "<td>" . htmlspecialchars($row['StudentLastname']) . "</td>";
    echo "<td>" . htmlspecialchars($row['SubjectID']) . "</td>";
    echo "<td>" . htmlspecialchars($row['total_units']) . "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>

<?php
mysqli_close($conn);
?>
