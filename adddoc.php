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
    if (isset($_REQUEST["btnadd"])) {
        $docnm = $_REQUEST["docnm"];
        $doccnt = $_REQUEST["doccnt"];
        $docqulif = $_REQUEST["docqulif"];
        $filename = $_FILES["docimg"]["name"];
        $filetype = $_FILES["docimg"]["type"];
        $filetmpname = $_FILES["docimg"]["tmp_name"];

        // Validate file type
        $allowedTypes = array('image/jpeg', 'image/jpg', 'image/png');
        if (!in_array($filetype, $allowedTypes)) {
            echo "<script>alert('Only JPEG, JPG, and PNG files are allowed.')</script>";
        } else {
            // Move uploaded file
            $uploadDir = "docimg/";
            $uploadPath = $uploadDir . $filename;
            if (move_uploaded_file($filetmpname, $uploadPath)) {
                $adddoc = "INSERT INTO doctor(docnm, doccnt, docqulif, docimg) VALUES ('$docnm', '$doccnt', '$docqulif', '$filename')";
                $done = mysqli_query($con, $adddoc);
                if ($done) {
                    echo "<div class='alert alert-warning alert-dismissible text-center fade show' role='alert'>
                    <strong>Doctor Added</strong>
                    <button type='button' class='btn btn-outline-warning' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
                }
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
        <h2 class="text-center mb-4">Add Doctor</h2>
        <form id="loginForm" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="docnm">Doctor Name</label>
                <input type="text" class="form-control" id="docnm" name="docnm" required>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Doctor Image</label>
                <input class="form-control" type="file" id="formFile" name="docimg" required>
            </div>
            <div class="form-group">
                <label for="doccnt">Doctor Contact</label>
                <input type="text" class="form-control" id="doccnt" name="doccnt" required>
            </div>
            <div class="form-group">
                <label for="docqulif">Doctor Qualification</label>
                <input type="text" class="form-control" id="docqulif" name="docqulif" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mid" name="btnadd">Add</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>