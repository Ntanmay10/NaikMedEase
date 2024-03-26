<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <?php include_once 'navbar.php'; ?>
    <link rel="stylesheet" href="./css/aboutus.css">
    <style>

        .mid {
            margin-left: 45%;
        }
    </style>
</head>

<body>
    <div class="container">
        <p>
            At NaikMedEase, we believe in making quality healthcare products accessible and affordable for everyone. Since2016, we've been committed to providing a convenient and reliable online platform where you can find everything you need for your health and well-being. We offer a diverse selection of genuine medications, over-the-counter products, and health supplies, all at competitive prices.
            Founded by a team of passionate healthcare professionals, [Store Name] was born from the desire to empower people to take control of their health. We believe in transparent communication, personalized care, and going the extra mile to ensure our customers' satisfaction.
        </p>
        <p>
            That's why we have a dedicated team of licensed pharmacists available to answer your questions and provide expert advice. We source our products from reputable suppliers and maintain strict quality control measures to ensure you receive genuine and safe products.
            We are dedicated to offering a trusted and reliable online pharmacy experience. Explore our wide range of products, discover our competitive prices, and experience the convenience of fast and discreet delivery.
        </p>
        <p>
            Your health is our priority. Contact us today if you have any questions or need assistance finding the right products for your needs.
        </p>
    </div>
    <?php
    if (!isset($_SESSION['usernm'])) {
        echo "<div><button type='submit' onclick='home();' class='btn btn-primary mid'>Home</button></div>";
    }
    ?>

    <script src="./js/nav.js"></script>
</body>

</html>