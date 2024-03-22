<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You!</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .thank-you-container {
      text-align: center;
      margin-top: 100px;
    }

    .thank-you-message {
      font-size: 48px;
      margin-bottom: 30px;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.1);
      }
      100% {
        transform: scale(1);
      }
    }

    .return-button {
      font-size: 24px;
      padding: 10px 30px;
      border-radius: 30px;
      background-color: #007bff;
      color: #fff;
      border: none;
      transition: all 0.3s ease;
    }

    .return-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="thank-you-container">
      <div class="thank-you-message animate__animated animate__bounceInDown">
        Thank You for Your Payment!
      </div>
      <a href="index.php" class="btn btn-primary return-button animate__animated animate__fadeInUp">Return to Home</a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
