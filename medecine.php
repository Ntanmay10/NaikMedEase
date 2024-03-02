<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/medecine.css">
  <title>Medicine</title>
</head>

<body>
  <?php include_once 'navbar.php' ?>
  <div class="card-container">
    <?php
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "naikmedease");
    $result = mysqli_query($con, "SELECT * FROM product");
    //loop through the item table and gather details of the item and printing them
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='card pro'>
              <img src='./images/medecine.jpg' alt='Card 1 Image'>
              <div class='card-info'>
                <h5 class='card-title pt-1'>&#8377;" . $row['prdpri'] . "</h5>
                <p class='card-text'>" . $row['prdnm'] . "</p>
                <a href='#' class='btn btn-primary'>Add to cart</a>
              </div>
            </div>";
    }
    ?>
  </div>

</body>

</html>