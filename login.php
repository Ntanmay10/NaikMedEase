<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <?php include_once './navbar.php'; ?>
  <link rel="stylesheet" href="./css/form.css">
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
      echo "<script>alert('Invalid Credentials')</script>";
    }
  }
  ?>
</head>

<body>
  <div class="form-container" method="post">
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
          <a href="#" id="forgotPasswordLink">Forgot Password?</a>
          <a href="#" id="signUpLink" onclick="signup();">Sign Up</a>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block mid" name="btnlog">Login</button>
    </form>
  </div>
  <script src="./js/nav.js"></script>
</body>

</html>