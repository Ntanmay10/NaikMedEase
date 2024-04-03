<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <?php include_once './navbar.php'; ?>
  <?php
  $con = mysqli_connect("localhost", "root", "");
  mysqli_select_db($con, "naikmedease");
  if (isset($_REQUEST["btnlog"])) {
    $usernm = $_REQUEST["usernm"];
    $passwd = $_REQUEST["passwd"];
    $q = "SELECT * FROM registration WHERE usernm='$usernm' AND passwd='$passwd'";
    $t = mysqli_query($con, $q);
    if (mysqli_num_rows($t) > 0) {
      $row = mysqli_fetch_array($t);
      if ($row['usertyp'] == 'Admin') {
        $_SESSION['regid'] = $row['regid'];
        $_SESSION['usernm'] = 'Admin';
        header('location:Admin.php');
      } else {
        $_SESSION['regid'] = $row['regid'];
        $_SESSION['usernm'] = $usernm;
        header('location:index.php');
      }
    } else {
      echo "<div class='alert alert-warning alert-dismissible text-center fade show' role='alert'>
      <strong>Invalid Credentials</strong>
      <button type='button' class='btn btn-outline-warning' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>
    ";
    }
  }
  ?>
  <link rel="stylesheet" href="./css/form.css">
  <style>
    body {
      background-image: url(images/bg16.png);
      background-repeat: no-repeat;
      background-size: cover;
    }

    .opa {
      opacity: 0.90;
    }

    .mid {
      margin-left: 42%;
    }
  </style>
</head>

<body>
  <div class="form-container opa" method="post">
    <h2 class="text-center mb-4">Login</h2>
    <form id="loginForm" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="usernm" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="passwd" required>
      </div>
      <div class="form-group">
        <div class="d-flex justify-content-between align-items-center">
          <a href="updatepassword.php" id="forgotPasswordLink">Forgot Password?</a>
          <a href="#" id="signUpLink" onclick="signup();">Sign Up</a>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block mid" name="btnlog">Login</button>
    </form>
  </div>
  <script src="./js/nav.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

