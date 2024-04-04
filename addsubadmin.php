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
      echo "<div class='alert alert-warning alert-dismissible text-center fade show' role='alert'>
      <strong>Email or username already exists</strong>
      <button type='button' class='btn btn-outline-warning' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
    } else {
      $q = "insert into registration (fullnm,usernm,email,passwd,secucode,usertyp) values ('$fullnm','$usernm','$email','$passwd','$secucode','Admin')";
      $exeqr = mysqli_query($con, $q);
      if ($exeqr) {
        echo "
        <div class='alert alert-warning alert-dismissible text-center fade show' role='alert'>
      <strong>Sub Admin Added</strong>
      <button type='button' class='btn btn-outline-warning' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>
        ";
      }
    }
  }
  ?>
  <style>
    .mid {
      margin-left: 41%;
    }
  </style>
</head>


<body>
  <div class="form-container" method="post">
    <h2 class="text-center mb-4">Add sub Admin</h2>
    <form id="registrationForm" method="post">
      <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control" id="fullName" name="fullnm" pattern="[A-Za-z ]{3,30}" title="Minimum 3chars and Max 30, Chars Only" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="usernm" pattern="[A-Za-z 0-9]{3,30}" title="Minimum 3 and Max 30 alphanumeric code" required>
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
      <button type="submit" name="btnsub" class="btn btn-primary btn-block mid">Add</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>