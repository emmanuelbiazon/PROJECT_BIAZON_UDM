<!DOCTYPE html>
<html>
<head>
    <title>Loan Calculator Resulta</title>
</head>
<body>
<fieldset style = "Margin: auto 700px;">
<hr> 
<?php

$amount = $_POST['amount'];
$interest = $_POST['interest'];
$period = $_POST['period'];

// Interest computation
$totalInterest = ($amount * ($interest / 100)) * ($period / 12);

// Total payable
$totalPayable = $amount + $totalInterest;

// Monthly payment
$monthlyPayable = $totalPayable / $period;

echo "<h2>Loan Result</h2>";

echo "Loan Amount: " . number_format($amount,2) . "<br>";
echo "Total Interest: " . number_format($totalInterest,2) . "<br>";
echo "Total Payable: " . number_format($totalPayable,2) . "<br>";
echo "Monthly Payable: " . number_format($monthlyPayable,2);

?>
</fieldset>
</body>
</html>