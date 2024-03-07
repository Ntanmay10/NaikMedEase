<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Profile</title>
    <?php include_once './navbar.php' ?>
    <link rel="stylesheet" href="./css/form.css">
    <?php
    if (empty($_SESSION['usernm'])) {
        header('location:login.php');
    }
    ?>
    <?php
    function getdata()
    {
        $con = mysqli_connect("localhost", "root", "", "naikmedease");
        $usernm = $_SESSION['usernm'];
        $q = mysqli_query($con, "select * from registration where usernm = '$usernm'");
        if ($q) {
            while ($row = mysqli_fetch_array($q)) {
                $GLOBALS["fullnm"] = $row['fullnm'];
                $GLOBALS["passwd"] = $row['passwd'];
            }
        }
    }
    ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $usernm = $_SESSION["usernm"];
    if (isset($_REQUEST["btnupd"])) {
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
                <input type="text" class="form-control" id="fullName" name="fullnm" value="<?php getdata(); echo $fullnm ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="passwd" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                value="<?php getdata(); echo $passwd ?>" required>
            </div>
            <button type="submit" name="btnupd" class="btn btn-primary btn-block mid">Update</button>
        </form>
    </div>
</body>

</html>