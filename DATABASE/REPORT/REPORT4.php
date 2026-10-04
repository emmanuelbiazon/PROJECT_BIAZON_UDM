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
            t.tlname AS teacher_lastname,
            COUNT(DISTINCT e.subjectID) AS number_of_subjects
        FROM teachers t
        JOIN enrollment e ON t.tnum = e.tnum
        GROUP BY t.tnum, t.tlname
        ORDER BY t.tlname ASC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report 4</title>
</head>
<body>

<h2>Subjects Handled Per Teacher</h2>

<table border="1">
<tr>
    <th>Teacher Lastname</th>
    <th>Number of Subjects</th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['teacher_lastname']."</td>";
    echo "<td>".$row['number_of_subjects']."</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>