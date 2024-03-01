<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./css/medecine.css">
</head>

<body>
    <?php include_once 'navbar.php' ?>
    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Update Product</h2>
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="username">Product Name</label>
                <!-- <input type="text" class="form-control" id="username" name="prdnm" required> -->
                <select name="prdnm">
                <?php
                    $con = mysqli_connect("localhost", "root", "");
                    mysqli_select_db($con, "naikmedease");
                    $result = mysqli_query($con, "SELECT * FROM product");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <option value=" . $row['prdnm'] . ">
                        " . $row['prdnm'] . "
                        </option>
                        ";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="prodnewname">Product New Name</label>
                <input type="text" class="form-control" id="prodnewname" name="prodnewname" required>
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
if (isset($_REQUEST["btnupd"])) {
    $prdnm = $_REQUEST["prdnm"];
    $prodnewname = $_REQUEST["prodnewname"];
    $prdnewpri = $_REQUEST["prdnewpri"];
    $q = "SELECT * FROM product WHERE prdnm='$prdnm'";
    $t = mysqli_query($con, $q);
    if (mysqli_num_rows($t) > 0) {
        $updprd = "UPDATE product SET prdnm='$prodnewname', prdpri='$prdnewpri' where prdnm = '$prdnm'";
        $done = mysqli_query($con, $updprd);
        if ($done) {
            echo "<script>alert('Product Updated')</script>";
        }
    } else {
        echo "<script>alert('Product dosen\'t exists')</script>";
    }
}
?>