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
        $filetype = $_FILES["medimg"]["type"];
        $filetmpname = $_FILES["medimg"]["tmp_name"];

        // Validate file type
        $allowedTypes = array('image/jpeg', 'image/jpg', 'image/png');
        if (!in_array($filetype, $allowedTypes)) {
            echo "<script>alert('Only JPEG, JPG, and PNG files are allowed.')</script>";
        } else {
            // Move uploaded file
            $uploadDir = "medimage/";
            $uploadPath = $uploadDir . $filename;
            if (move_uploaded_file($filetmpname, $uploadPath)) {
                $q = "SELECT * FROM product WHERE prdnm='$prdnm'";
                $t = mysqli_query($con, $q);
                if (mysqli_num_rows($t) > 0) {
                    echo "<div class='alert alert-warning alert-dismissible text-center fade show' role='alert'>
                    <strong>Product already exists</strong>
                    <button type='button' class='btn btn-outline-warning' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
                } else {
                    $addprd = "INSERT INTO product(prdnm, prdpri, compid, prdimg, stock) VALUES ('$prdnm', '$prdpri', '$compid', '$filename', '$prdunit')";
                    $done = mysqli_query($con, $addprd);
                    if ($done) {
                        echo "<div class='alert alert-warning alert-dismissible text-center fade show' role='alert'>
                        <strong>Product Inserted</strong>
                        <button type='button' class='btn btn-outline-warning' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                    }
                }
            } else {
                echo "<script>alert('Error uploading file. Please try again.')</script>";
            }
        }
    }
    ?>
    <style>
        .mid {
            margin-left: 42%;
        }
    </style>
</head>

<body>
    <div class="form-container" method="post">
        <h2 class="text-center mb-4">Add Product</h2>
        <form id="loginForm" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Product Name</label>
                <input type="text" class="form-control" id="username" name="prdnm" pattern='[A-Za-z0-9 ]{3,15}' title="Follow the pattern" required>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Medecine Image</label>
                <input class="form-control" type="file" id="formFile" name="medimg" required>
            </div>
            <div class='form-group'>
                <label for='company'>Product Company</label>
                <select name="company">
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM company");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <option 
                        value=" . $row['compid'] . " required>
                        " . $row['compname'] . "
                        </option>
                        ";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="prodprice">Product Price</label>
                <input type="text" class="form-control" id="prodprice" pattern="[0-9]{1,4}" name="prdpri" required>
            </div>
            <div class="form-group">
                <label for="prdunit">Unit</label>
                <input type="text" class="form-control" id="prdunit" pattern="[0-9]{1,4}" name="prdunit" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btnaddmed">Add</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>