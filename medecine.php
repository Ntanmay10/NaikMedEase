<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medicine</title>
  <?php include_once 'navbar.php' ?>
  <link rel="stylesheet" href="./css/medecine.css">
  <?php
  $con = mysqli_connect("localhost", "root", "");
  mysqli_select_db($con, "naikmedease");

  if (isset($_REQUEST['btncart'])) {
    $regid = $_SESSION['regid'];
    $prdid = $_REQUEST['btncart'];
    $sql = "SELECT * FROM cart WHERE prdid= '$prdid' AND regid='$regid'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='alert alert-warning alert-dismissible text-center fade show' role='alert'>
      <strong>Item already added to cart</strong>
    </div>
    ";
    } else {
      $addtocart = mysqli_query($con, "insert into cart(prdid,regid) values($prdid,$regid)");
    }
  }

  if (isset($_REQUEST['btnbuy'])) {
    $_SESSION['prdid'] = $_REQUEST['btnbuy'];
    header('location:buynow.php');
  }
  ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="./css/vieworder.css">
  <style>
    .mla{
      margin-left: 47%;
    }
    body {
      background-image: url(images/bg16.png);
      background-repeat:no-repeat;
      background-size:cover;
    }
  </style>
</head>

<body>
  <form action="" method="post">
    <div class="box">
      <nav>
        <div class="lbl middle">Search</div>
        <div class="input-group ml-5">
          <input type="text" class="form-control w-25" name="myInput" placeholder="Medicine" aria-label="Username" aria-describedby="basic-addon1">
          <div class="input-group-prepend">
            <button class="input-group-text material-symbols-outlined" name="search" id="basic-addon1">search</button>
          </div>
        </div>
      </nav>
    </div>
    <div class="clr">
      <button type="submit" value="" class="btn btn-primary mla">Clear</button>
    </div>
    <div class="card-container">
      <?php
      if (isset($_REQUEST["search"])) {
        $keyword = "%".$_REQUEST["myInput"]."%";
        $sql = "SELECT * FROM product WHERE prdnm LIKE '$keyword' AND stock >=5 ORDER BY prdid ASC";
        $result = mysqli_query($con, $sql);
        //loop through the item table and gather details of the item and printing them
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='card pro'>
          <img src='./medimage/" . $row['prdimg'] . "' alt='Card 1 Image' width='100%'  height='250px'>
          <div class='card-info'>
          <h5 class='card-title pt-1'>&#8377;" . $row['prdpri'] . "</h5>
          <p class='card-text'>" . $row['prdnm'] . "</p>
          <form method='post'>
                <button type='submit' class='btn btn-primary' value=" . $row['prdid'] . " name='btncart'>Add to cart</button>
                  <button type='submit' class='btn btn-success mt-1' value=" . $row['prdid'] . " name='btnbuy'>Buy Now</button>
                  </form>
                  </div>
                  </div>";
        }
      } else {
        $result = mysqli_query($con, "SELECT * FROM product WHERE stock >= 5");
        //loop through the item table and gather details of the item and printing them
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='card pro'>
        <img src='./medimage/" . $row['prdimg'] . "' alt='Card 1 Image' width='100%'  height='250px'>
        <div class='card-info'>
        <h5 class='card-title pt-1'>&#8377;" . $row['prdpri'] . "</h5>
        <p class='card-text'>" . $row['prdnm'] . "</p>
        <form method='post'>
              <button type='submit' class='btn btn-primary' value=" . $row['prdid'] . " name='btncart'>Add to cart</button>
                <button type='submit' class='btn btn-success mt-1' value=" . $row['prdid'] . " name='btnbuy'>Buy Now</button>
                </form>
                </div>
                </div>";
        }
      }
      ?>
  </form>
</body>

</html>