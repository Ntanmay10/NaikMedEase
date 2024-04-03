<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'navbar.php'; ?>
  <title>Registration Form</title>
  <link rel="stylesheet" href="./css/form.css">
  <?php
  $con = mysqli_connect("localhost", "root", "");
  mysqli_select_db($con, "naikmedease");

  if (isset($_REQUEST["btnsub"])) {
    $fullnm = $_REQUEST["fullnm"];
    $email = $_REQUEST["email"];
    $usernm = $_REQUEST["usernm"];
    $passwd = $_REQUEST["passwd"];
    $secucode = $_REQUEST["secucode"];

    $chk = "SELECT * FROM registration WHERE email='$email' OR usernm='$usernm'";
    $t = mysqli_query($con, $chk);
    if (mysqli_num_rows($t) > 0) {
      echo "<script>alert('Email or Username already Exists')</script>";
    } else {
      $q = "insert into registration (fullnm,usernm,email,passwd,secucode) values ('$fullnm','$usernm','$email','$passwd','$secucode')";
      $exeqr = mysqli_query($con, $q);
      if ($exeqr) {
        header('location:login.php');
      }
    }
  }
  ?>
  <style>
    body {
      background-image: url(images/bg16.png);
      background-repeat:no-repeat;
      background-size:cover;
    }

    .opa{
      opacity:  0.80;
    }

    .mid{
      margin-left: 41%;
    }
  </style>
</head>


<body>
  <div class="form-container opa" method="post">
    <h2 class="text-center mb-4">Sign Up</h2>
    <form id="registrationForm" method="post">
      <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control" id="fullName" name="fullnm" pattern="[A-Za-z ]{3,30}"
        title="Minimum 3chars and Max 30, Chars Only" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="usernm"  pattern="[A-Za-z 0-9]{3,30}"
        title="Minimum 3 and Max 30 alphanumeric code" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="passwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number
        and one uppercase and lowercase letter, and at least 8 or more characters" required>
      </div>
      <div class="form-group">
        <label for="secucode">Security Code</label>
        <input type="text" class="form-control" id="secucode" pattern="[0-9]{4}" title="Enter 4 digit security code" name="secucode" required>
      </div>
      <button type="submit" name="btnsub" class="btn btn-primary btn-block mid">Sign Up</button>
    </form>
  </div>
</body>

</html>