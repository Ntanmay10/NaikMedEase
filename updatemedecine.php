<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Medecine</title>
    <?php include_once 'navbar.php' ?>
    <?php
    function getdata()
    {
        $con = mysqli_connect("localhost", "root", "", "naikmedease");
        $prdid = $_SESSION['prdid'];
        $q = mysqli_query($con, "select * from product where prdid = '$prdid'");
        if ($q) {
            while ($row = mysqli_fetch_array($q)) {
                $GLOBALS["prdnm"] = $row['prdnm'];
                $GLOBALS["prdpri"] = $row['prdpri'];
                $GLOBALS["prdunit"] = $row['stock'];
                $GLOBALS["prdimg"] = $row['prdimg'];
            }
        }
    }
    ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    if (isset($_REQUEST["btnupdmed"])) {
        $prdid = $_SESSION['prdid'];
        $prdnm = $_REQUEST["prdnm"];
        $prdpri = $_REQUEST["prdpri"];
        $prdstock = $_REQUEST["prdunit"];
        $updfilename = $_FILES["updmedimg"]["name"];
        $updtmpname = $_FILES["updmedimg"]["tmp_name"];
        move_uploaded_file($updtmpname, "medimage/$updfilename");
        $q = "SELECT * FROM product WHERE prdid='$prdid'";
        $t = mysqli_query($con, $q);
        if (mysqli_num_rows($t) > 0) {
            $updprd = "UPDATE product SET prdnm='$prdnm', prdpri='$prdpri',stock='$prdstock',prdimg='$updfilename' where prdid = '$prdid'";
            $done = mysqli_query($con, $updprd);
            if ($done) {
                header('location:managemedicine.php');
            }
        }
    }
    ?>
    <link rel="stylesheet" href="./css/form.css">
    <style>
        .mid{
            margin-left: 42%;
        }
    </style>
</head>

<body>
    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Update medecine</h2>
        <form id="loginForm" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Product Name</label>
                <input type="text" class="form-control" id="username" name="prdnm" value="<?php getdata(); echo $prdnm ?>" required>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Medecine Image</label>
                <img src="./medimage/<?php getdata(); echo $prdimg ?>" alt="prdimg" width="30%" height="100px">
                <input class="form-control mt-1" type="file" id="formFile" name="updmedimg" title="<?php getdata(); echo $prdimg ?>">
            </div>
            <div class="form-group">
                <label for="prodprice">Product Price</label>
                <input type="text" class="form-control" id="prodprice" name="prdpri" value="<?php getdata(); echo $prdpri ?>" required>
            </div>
            <div class="form-group">
                <label for="prdunit">Product Unit</label>
                <input type="text" class="form-control" id="prdunit" name="prdunit" value="<?php getdata(); echo $prdunit ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btnupdmed">Update</button>
        </form>
    </div>

</body>

</html>