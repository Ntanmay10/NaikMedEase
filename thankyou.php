<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You!</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/thankyou.css">
</head>

<body>
  <div class="thank-you-container animate__animated animate__bounceInDown">
    <div class="thank-you-message">
      Thank You for Your Payment!
    </div>
    <button class="return-button animate__animated animate__fadeInUp" onclick="returnHome()">Return to Home</button>
  </div>

  <script>
    function returnHome() {
      window.location.href = "index.php";
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>