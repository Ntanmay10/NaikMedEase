<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Naik MedEase</title>
    <?php include_once 'navbar.php'; ?>
    <link rel="stylesheet" href="./css/index.css">
    <style>
        .msg {
            width: 50%;
            margin-left: 25%;
            text-align: center;
        }
    </style>
</head>

<body>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./images/s1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./images/s2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./images/s3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./images/s4.jpg" class="d-block w-100" height="353px" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <?php
    if (!isset($_SESSION['usernm'])) {
        echo " <div class='msg'>
        <h1>Login to get started</h1>
        </div>";
    }
    ?>
    <div class="iconimage">
        <img src="./Images/Iconbar.jpg" alt="unclickable icons" />
    </div>

    <?php include_once 'footer.php'; ?>
</body>

</html>