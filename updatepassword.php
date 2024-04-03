<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <?php include_once 'navbar.php' ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    if (isset($_REQUEST["btnchng"])) {
        $email = $_REQUEST['email'];
        $usernm = $_REQUEST['usernm'];
        $secucode = $_REQUEST['secucode'];
        $newpass = $_REQUEST['newpass'];

        $getuser = mysqli_query($con, "SELECT * FROM registration WHERE email = '$email'AND usernm = '$usernm' AND secucode='$secucode'");
        if (mysqli_num_rows($getuser)>0) {
            $updatepass=mysqli_query($con,"update registration set passwd='$newpass' where email='$email'");
            echo "<script>alert('Password Updated Successfully')</script>";
            header("location:login.php");
        }else{
            echo "<script>alert('No user found')</script>";
        }
    }
    ?>
    <link rel="stylesheet" href="./css/form.css">
    <style>
        body {
      background-image: url(images/bg16.png);
      background-repeat:no-repeat;
      background-size:cover;
    }

    .opa{
      opacity:  0.80;
    }

        .mid {
            margin-left: 32%;
        }
    </style>
</head>

<body>
    <div class="form-container opa">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="usernm" required>
            </div>

            <div class="col-md-6">
                <label for="secucode" class="form-label">Security Code</label>
                <input type="text" class="form-control" id="secucode" name="secucode" required>
            </div>
            <div class="col-md-6">
                <label for="newpass" class="form-label">New Password</label>
                <input type="text" class="form-control" id="newpass" name="newpass"
                 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number
        and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mid" name="btnchng">Change password</button>
            </div>
        </form>
    </div>
</body>

</html>