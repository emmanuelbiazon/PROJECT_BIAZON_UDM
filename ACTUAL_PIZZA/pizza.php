<!DOCTYPE html>
<html>

<head>

    <title>Your Results!</title>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="pizza.css">

</head>

<body>

<div class="pizza-container">

    <h1>🍕 Your Pizza Order</h1>


<?php

// GET CUSTOMER INFORMATION

$customer_name = $_POST["customer_name"];

$address = $_POST["address"];


// GET SIZE

$size = $_POST["size"];


// GET CRUST

$crust = $_POST["crust"];


// GET TOPPINGS

if (isset($_POST["toppings"])) {

    $toppings = $_POST["toppings"];

} else {

    $toppings = array();

}


// START PRICE

$total = 0;


// SIZE PRICE

if ($size == "Small") {

    $total = $total + 150;

}

elseif ($size == "Medium") {

    $total = $total + 200;

}

elseif ($size == "Large") {

    $total = $total + 250;

}


// CRUST PRICE

if ($crust == "Thin Crust") {

    $total = $total + 20;

}

elseif ($crust == "Stuffed Crust") {

    $total = $total + 40;

}


// TOPPING PRICES

foreach ($toppings as $topping) {

    if ($topping == "Pepperoni") {

        $total = $total + 30;

    }

    elseif ($topping == "Mushroom") {

        $total = $total + 25;

    }

    elseif ($topping == "Ham") {

        $total = $total + 30;

    }

    elseif ($topping == "Bacon") {

        $total = $total + 35;

    }

}

?>


<h2>Order Summary</h2>

<p>
    <strong>Customer:</strong>
    <?php echo $customer_name; ?>
</p>

<p>
    <strong>Address:</strong>
    <?php echo $address; ?>
</p>

<hr>


<h3>Pizza Details</h3>

<p>
    <strong>Size:</strong>
    <?php echo $size; ?>
</p>

<p>
    <strong>Crust:</strong>
    <?php echo $crust; ?>
</p>


<h3>Toppings</h3>

<?php

if (count($toppings) > 0) {

    echo "<ul>";

    foreach ($toppings as $topping) {

        echo "<li>" . $topping . "</li>";

    }

    echo "</ul>";

}

else {

    echo "<p>No toppings selected.</p>";

}

?>


<hr>


<h2>Total: ₱<?php echo $total; ?></h2>


<button onclick="window.location.href='pizza.html'">
    Order Another Pizza
</button>


</div>

</body>

</html>