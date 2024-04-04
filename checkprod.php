<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check Products</title>
  <?php include_once 'navbar.php' ?>
  <link rel="stylesheet" href="./css/medecine.css">
  <?php
  $con = mysqli_connect("localhost", "root", "","naikmedease");
  $order_id=$_SESSION['order_id'];
  ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="./css/vieworder.css">
  <style>
    body {
      background-image: url(images/bg16.png);
      background-repeat:no-repeat;
      background-size:cover;
    }
    .mid {
            margin-left: 48%;
        }
  </style>
</head>

<body>
    <div class="card-container">
      <?php
        $getord=mysqli_query($con,"select * from order_details where order_id= '$order_id' ");
        while ($roword=mysqli_fetch_array($getord)) {
            $result = mysqli_query($con, "SELECT * FROM product WHERE prdid= '$roword[product_id]'");
            //loop through the item table and gather details of the item and printing them
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card pro'>
                <img src='./medimage/" . $row['prdimg'] . "' alt='Card 1 Image' width='100%'  height='250px'>
                <div class='card-info'>
                <h5 class='card-title pt-1'>&#8377;" . $row['prdpri'] . "</h5>
                <p class='card-text'>" . $row['prdnm'] . "</p>
                <p class='card-text'>Quantity: " . $roword['quantity'] . "</p>
                </div>
                </div>";
        }
    }
        ?>
    </div>
          <a href="vieworders.php" class="btn btn-danger mt-3 mid">Return</a>
</body>

</html>