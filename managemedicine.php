<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <?php include_once 'navbar.php' ?>

    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Add Product</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="username">Product Name</label>
                <input type="text" class="form-control" id="username" name="prdnm" required>
            </div>
            <div class='form-group'>
                <label for='company'>Product Company</label>
                <select name="company">
                    <?php
                    $con = mysqli_connect("localhost", "root", "");
                    mysqli_select_db($con, "naikmedease");
                    $result = mysqli_query($con, "SELECT * FROM company");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <option value=" . $row['compid'] . ">
                        " . $row['compname'] . "
                        </option>
                        ";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="prodprice">Product Price</label>
                <input type="text" class="form-control" id="prodprice" name="prdpri" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btnadd">Add</button>
        </form>
    </div>
    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Delete Product</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="username">Product Name</label>
                <input type="text" class="form-control" id="username" name="prdnm" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btndel">Delete</button>
        </form>
    </div>
    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Update Product</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="username">Product Name</label>
                <input type="text" class="form-control" id="username" name="prdnm" required>
            </div>
            <div class="form-group">
                <label for="prodnewprice">Product New Price</label>
                <input type="text" class="form-control" id="prodnewprice" name="prdnewpri" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btnupd">Update</button>
        </form>
    </div>

</html>
<?php
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "naikmedease");
if (isset($_REQUEST["btnadd"])) {
    $prdnm = $_REQUEST["prdnm"];
    $prdpri = $_REQUEST["prdpri"];
    $compid=$_REQUEST["company"];
    $q = "SELECT * FROM product WHERE prdnm='$prdnm'";
    $t = mysqli_query($con, $q);
    if (mysqli_num_rows($t) > 0) {
        echo "<script>alert('Product already exists')</script>";
    } else {
        $addprd = "insert into product(prdnm,prdpri,compid) values('$prdnm','$prdpri','$compid')";
        $done = mysqli_query($con, $addprd);
        if ($done) {
            echo "<script>alert('Product inserted')</script>";
        }
    }
} 

if (isset($_REQUEST["btndel"])) {
    $prdnm = $_REQUEST["prdnm"];
    $q = "SELECT * FROM product WHERE prdnm='$prdnm'";
    $t = mysqli_query($con, $q);
    if (mysqli_num_rows($t) == 0) {
        echo "<script>alert('Product dosen\'t exists')</script>";
    } else {
        $delprd = "DELETE FROM product where prdnm = '$prdnm'";
        $done = mysqli_query($con, $delprd);
        if ($done) {
            echo "<script>alert('Product Deleted')</script>";
        }
    }
}

if (isset($_REQUEST["btnupd"])) {
    $prdnm = $_REQUEST["prdnm"];
    $prdnewpri = $_REQUEST["prdnewpri"];
    $q = "SELECT * FROM product WHERE prdnm='$prdnm'";
    $t = mysqli_query($con, $q);
    if (mysqli_num_rows($t) > 0) {
        $updprd = "UPDATE product SET prdpri='$prdnewpri' where prdnm = '$prdnm'";
        $done = mysqli_query($con, $updprd);
        if ($done) {
            echo "<script>alert('Product Updated')</script>";
        }
    } else {
        echo "<script>alert('Product dosen\'t exists')</script>";
    }
}
?>