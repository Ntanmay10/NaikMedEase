<?php include_once 'navbar.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/medecine.css">
  <title>Medicine</title>
  <?php
  $con = mysqli_connect("localhost", "root", "");
  mysqli_select_db($con, "naikmedease");

  if (isset($_REQUEST['btncart'])) {
    $regid=$_SESSION['regid'];
    $prdid=$_REQUEST['btncart'];
    $addtocart=mysqli_query($con,"insert into cart(prdid,regid) values($prdid,$regid)");
  }
  ?>
</head>

<body>
  <div class="card-container">
    <?php
    $result = mysqli_query($con, "SELECT * FROM product");
    //loop through the item table and gather details of the item and printing them
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='card pro'>
              <img src='./images/medecine.jpg' alt='Card 1 Image'>
              <div class='card-info'>
                <h5 class='card-title pt-1'>&#8377;" . $row['prdpri'] . "</h5>
                <p class='card-text'>" . $row['prdnm'] . "</p>
                <form method='post'>
                <button type='submit' class='btn btn-primary' value=".$row['prdid']." name='btncart'>Add to cart</button>
                </form>
              </div>
            </div>";
    }
    ?>
  </div>

</body>

</html>