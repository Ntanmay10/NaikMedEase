<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Medecine</title>
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <?php include_once 'navbar.php' ?>
    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Update medecine</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="username">Product Name</label>
                <input type="text" class="form-control" id="username" name="prdnm" value="<?php getdata(); echo $prdnm ?>" required>
            </div>
            <div class="form-group">
                <label for="prodprice">Product Price</label>
                <input type="text" class="form-control" id="prodprice" name="prdpri" value="<?php getdata(); echo $prdpri ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btnupdmed">Update</button>
        </form>
    </div>

</body>

</html>

<?php
function getdata()
{
    $con=mysqli_connect("localhost","root","","naikmedease");
    $prdid=$_SESSION['prdid'];
    $q=mysqli_query($con,"select * from product where prdid = '$prdid'");
    if($q){
        while($row=mysqli_fetch_array($q)){
            $GLOBALS["prdnm"] = $row['prdnm'];
            $GLOBALS["prdpri"] = $row['prdpri'];
        }
    }
}
?>

<?php
$con = mysqli_connect("localhost", "root", "","naikmedease");
if (isset($_REQUEST["btnupdmed"])) {
    $prdid=$_SESSION['prdid'];
    $prdnm = $_REQUEST["prdnm"];
    $prdpri = $_REQUEST["prdpri"];
    $q = "SELECT * FROM product WHERE prdid='$prdid'";
    $t = mysqli_query($con, $q);
    if (mysqli_num_rows($t) > 0) {
        $updprd = "UPDATE product SET prdnm='$prdnm', prdpri='$prdpri' where prdid = '$prdid'";
        $done = mysqli_query($con, $updprd);
        if ($done) {
            echo "<script>alert('Product Updated')</script>";
            header('location:managemedicine.php');
        }
    }
}
?>

