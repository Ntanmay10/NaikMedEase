<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Meds</title>
    <?php include_once 'navbar.php'; ?>
    <link rel="stylesheet" href="./css/form.css">
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    if (isset($_REQUEST["btnaddmed"])) {
        $prdnm = $_REQUEST["prdnm"];
        $prdpri = $_REQUEST["prdpri"];
        $compid = $_REQUEST["company"];
        $prdunit = $_REQUEST["prdunit"];
        $filename = $_FILES["medimg"]["name"];
        $tmpname = $_FILES["medimg"]["tmp_name"];
        move_uploaded_file($tmpname, "medimage/$filename");
        $q = "SELECT * FROM product WHERE prdnm='$prdnm'";
        $t = mysqli_query($con, $q);
        if (mysqli_num_rows($t) > 0) {
            echo "<script>alert('Product already exists')</script>";
        } else {
            $addprd = "insert into product(prdnm,prdpri,compid,prdimg,unit) values('$prdnm','$prdpri','$compid','$filename','$prdunit')";
            $done = mysqli_query($con, $addprd);
            if ($done) {
                echo "<script>alert('Product inserted')</script>";
            }
        }
    }
    ?>
</head>

<body>
    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Add Product</h2>
        <form id="loginForm" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Product Name</label>
                <input type="text" class="form-control" id="username" name="prdnm" required>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Medecine Image</label>
                <input class="form-control" type="file" id="formFile" name="medimg">
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
                        <option 
                        value=" . $row['compid'] . ">
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
            <div class="form-group">
                <label for="prdunit">Unit</label>
                <input type="text" class="form-control" id="prdunit" name="prdunit" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btnaddmed">Add</button>
        </form>
    </div>
</body>

</html>