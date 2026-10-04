<!DOCTYPE html>
<html>
<head>
    <title>Temperature Result</title>
</head>
<body>
<fieldset style = "Margin: auto 700px;">
<hr>
<?php

$temp = $_POST['temp'];
$choice = $_POST['choice'];

if($choice == "C")
{
	echo "<p> Celsius to Fahrenheit </p>";
    $answer = ($temp - 32) * 5 / 9;
    echo "<h2>$temp °F = " . round($answer,2) . " °C</h2>";
}
else
{
	echo "<p> Fahrenheit to Celsius </p>";
    $answer = ($temp * 9 / 5) + 32;
    echo "<h2>$temp °C = " . round($answer,2) . " °F</h2>";
}

?>
</fieldset>
</body>
</html>