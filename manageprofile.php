<?php include_once './navbar.php' ?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Profile</title>
    <link rel="stylesheet" href="./css/form.css">
    

<?php
if (empty($_SESSION['usernm'])) {
    header('location:login.php');
}
?>
<?php

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "naikmedease");

if (isset($_REQUEST["btnupd"])) {
    $usernm = $_SESSION["usernm"];
    $fullnm = $_REQUEST["fullnm"];
    $passwd = $_REQUEST["passwd"];
    $upd = " UPDATE registration SET fullnm='$fullnm', passwd='$passwd' WHERE usernm='$usernm'";
    $upddta = mysqli_query($con, $upd);
    header('location:logout.php');
}
?>
</head>

<body>
    <div class="form-container">
        <h2 class="text-center mb-4">Update Info</h2>
        <form id="registrationForm" method="post">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullnm" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="passwd" required>
            </div>
            <button type="submit" name="btnupd" class="btn btn-primary btn-block mid">Update</button>
        </form>
    </div>
</body>

</html>