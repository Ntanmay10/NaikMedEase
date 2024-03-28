<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <?php
  $con = mysqli_connect("localhost", "root", "", "naikmedease");
  $amount = $_SESSION["reciv"];
  if (isset($_REQUEST['subpay'])) {
    $transcode = $_REQUEST['transcode'];
    $regid = $_SESSION["regid"];
    $order_id=$_SESSION["orderID"];
    $saverec = mysqli_query($con, "insert into payment(transcode,amount,regid,order_id) values ('$transcode','$amount','$regid','$order_id')");
    header('location:thankyou.php');
  }
  ?>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/payment.css">
</head>

<body>
  <div class="container">
    <div class="payment-container">
      <div class="qr-code">
        <img src="./images/GooglePay_QR.png" alt="QR Code" width="300">
      </div>
      <div class="amount-display">
        <?php echo floor($amount) ?> &#8377;
      </div>
      <form method="post">
        <div class="form-group">
          <input type="text" class="form-control" id="transactionId" placeholder="Enter Transaction ID" name="transcode" pattern="[0-9]{15}" title="Enter the 15 digit transaction id" required>
        </div>
        <button type="submit" class="btn btn-primary mb-3 form-control" name="subpay">Submit Payment</button>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>