<?php include_once 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add company</title>
    <link rel="stylesheet" href="./css/form.css">
    
<?php
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "naikmedease");
if (isset($_REQUEST["btnadd"])) {
    $compname = $_REQUEST["compname"];
    $q = "SELECT * FROM company WHERE compname='$compname'";
    $t = mysqli_query($con, $q);
    if (mysqli_num_rows($t) > 0) {
        echo "<script>alert('Company already exists')</script>";
    } else {
        $addcomp = "insert into company(compname) values('$compname')";
        $done = mysqli_query($con, $addcomp);
        if ($done) {
            echo "<script>alert('Company inserted')</script>";
        }
    }
}

?>
</head>
<body>
    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Add Company</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="compname">Company Name</label>
                <input type="text" class="form-control" id="compname" name="compname" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btnadd">Add</button>
        </form>
    </div>
</body>
</html>
