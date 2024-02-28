<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="./css/form.css">
</head>

<?php include_once 'navbar.php'; ?>

<body>
  <div class="form-container">
    <h2 class="text-center mb-4">Sign Up</h2>
    <form id="registrationForm" method="post">
      <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control" id="fullName" name="fullnm" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="usernm" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="passwd" required>
      </div>
      <button type="submit" name="btnsub" class="btn btn-primary btn-block mid" onclick="login();">Sign Up</button>
    </form>
  </div>
</body>

</html>

<?php

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "naikmedease");

if (isset($_REQUEST["btnsub"])) {
  $regid = "";
  $fullnm = $_REQUEST["fullnm"];
  $email = $_REQUEST["email"];
  $usernm = $_REQUEST["usernm"];
  $passwd = $_REQUEST["passwd"];
  $usertyp = "";

  $chk = "SELECT * FROM registration WHERE email='$email' OR usernm='$usernm'";
  $t = mysqli_query($con, $chk);
  if (mysqli_num_rows($t) > 0) {
    echo "<script>alert('Email or Username already Exists')</script>";
  } else {
    $q = "insert into registration (fullnm,usernm,email,passwd) values ('$fullnm','$usernm','$email','$passwd')";
    $exeqr = mysqli_query($con, $q);
    if ($exeqr) {
      header('location:login.php');
    }
  }
}
?>