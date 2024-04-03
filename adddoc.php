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
                    echo "<script>alert('Doctor Added')</script>";
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
</body>

</html>