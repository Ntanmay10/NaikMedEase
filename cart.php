<?php include_once 'navbar.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $regid = $_SESSION['regid'];;
    $getcart = mysqli_query($con, "SELECT * FROM cart WHERE regid=$regid");
    ?>

</head>

<body>
    <?php
    while ($row=mysqli_fetch_assoc( $getcart )) {
        echo "<h2>" . $row["prdid"] . "</h2>";
    }
    ?>
</body>

</html>