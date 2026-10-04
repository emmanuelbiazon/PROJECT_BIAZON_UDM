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

$sql = "SELECT subjectID, COUNT(DISTINCT studentID) AS number_of_students
        FROM enrollment
        GROUP BY subjectID
        ORDER BY subjectID ASC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report 1</title>
</head>
<body>

<h2>Number of Students Enrolled Per Subject</h2>

<table border="1">
<tr>
    <th>Subject ID</th>
    <th>Number of Students</th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['subjectID']."</td>";
    echo "<td>".$row['number_of_students']."</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>