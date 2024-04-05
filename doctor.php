<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor</title>
  <?php include_once 'navbar.php' ?>
  <link rel="stylesheet" href="./css/medecine.css">
  <?php
  $con = mysqli_connect("localhost", "root", "");
  mysqli_select_db($con, "naikmedease");
  ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="./css/vieworder.css">
  <style>
    .mla {
      margin-left: 47%;
    }

    body {
      background-image: url(images/bg16.png);
      background-repeat: no-repeat;
      background-size: cover;
    }

    .ml5{
      margin-left: 45%;
    }
  </style>
</head>

<body>
  <form method="post">
    <div class="card-container">
      <?php
      $result = mysqli_query($con, "SELECT * FROM doctor");
      //loop through the item table and gather details of the item and printing them
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='card pro'>
        <img src='./docimg/" . $row['docimg'] . "' alt='Card 1 Image' width='100%'  height='250px'>
        <div class='card-info'>
        <h5 class='card-title pt-1'>Dr. " . $row['docnm'] . "</h5>
        <p class='card-text pt-2'>Qualification: " . $row['docqulif'] . "</p>
        <p class='card-text pt-2'>Contact No: " . $row['doccnt'] . "</p>
                </div>
                </div>";
      }
      ?>
    </div>
  </form>
  <a href="index.php" class="btn btn-primary btn-block mt-1 ml5">Back to Home Page</a>
</body>

</html>