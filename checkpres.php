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
    $pres=$_SESSION['pres']
    ?>
    <style>
        .mid {
            margin-left: 40%;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="text-center mb-4">Prescription</h2>
        <div>
            <?php
                $getpres=mysqli_query($con,"select preimg from prescription where order_id='$pres'");
                $showpres=mysqli_fetch_array($getpres);
                echo"
                <img src='./presimage/".$showpres[0]."' alt='img' height='500px' width='100%'>
                ";
            ?>
        </div>
        <a href="vieworders.php" class="btn btn-danger mt-3 mid">Return</a>
    </div>
</body>

</html>