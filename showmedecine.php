<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medicine</title>
  <?php include_once 'navbar.php' ?>
  <link rel="stylesheet" href="./css/medecine.css">
</head>

<body>
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
                <h5 class='card-title'>" . $row['prdpri'] . "</h5>
                <p class='card-text'>" . $row['prdnm'] . "</p>
                <a href='#' class='btn btn-primary'>More Details</a>
              </div>
            </div>";
    }
    ?>
  </div>

</body>

</html>