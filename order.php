<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <?php include_once 'navbar.php' ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $order = $_SESSION['order'];
    $tot = $_SESSION['total'];
    $getcartdata = mysqli_query($con, "SELECT * FROM CART WHERE regid='$order'");
    ?>

    <?php
    if (isset($_REQUEST["placeord"])) {
        $getcartdata1 = mysqli_query($con, "SELECT * FROM CART WHERE regid='$order'");
        while ($row2 = mysqli_fetch_array($getcartdata1)) {
            $orddate = date("d.m.Y");
            $regid = $_SESSION['order'];
            $prdid = $row2['prdid'];
            $addrs = $_REQUEST['address'];
            $qty = $row2['quantity'];
            $updateStock = mysqli_query($con, "UPDATE product SET stock = stock - $qty WHERE prdid = '$prdid'");
            $placeorder = mysqli_query($con, "INSERT INTO ordertab(regid,orddate,prdid,qty,addrs) VALUES('$regid','$orddate','$prdid','$qty','$addrs')");
            if ($placeorder) {
                $delcart = mysqli_query($con, "DELETE from CART where prdid='$prdid' and regid='$regid'");
            }
        }
        $tot = $_SESSION['reciv'];
        header('location:payment.php');
    }
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/order.css">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 text-center">Selected Products</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        while ($row = mysqli_fetch_array($getcartdata)) {
                            $getprd = mysqli_query($con, "select * from product where prdid='" . $row['prdid'] . "'");
                            while ($row1 = mysqli_fetch_array($getprd)) {
                                echo "
                                <div class='product'>
                                <img src='./medimage/" . $row1['prdimg'] . "' alt='Product 1'>
                                <div class='product-info'>
                                <h5 class='mb-1'>" . $row1['prdnm'] . "</h5>
                                <p class='mb-1'>&#8377;" . $row1['prdpri'] . "</p>
                                </div>
                                </div>
                                ";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="total-amount">
                    <h2 class="text-center">Total Amount</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sr.</th>
                                <th scope="col">Particular</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Sub Total</td>
                                <td><?php echo $tot ?>&#8377;</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>GST 18%</td>
                                <td><?php
                                    $taxpay = ($tot * 18) / 100.0;
                                    echo $taxpay;
                                    ?>
                                    &#8377;
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Disc 15%</td>
                                <td>
                                    <?php
                                    $befdisc = $tot + $taxpay;
                                    $disc = ($befdisc * 15) / 100.0;
                                    echo $disc;
                                    ?>
                                    &#8377;
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h3 class="text-center">Total:
                        <?php
                        $net_total = $befdisc - $disc;
                        echo floor($net_total) . "&#8377";
                        $_SESSION['reciv'] = $net_total;
                        ?>
                    </h3>
                    <form method="post">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Enter your address" required></textarea>
                        </div>
                        <button class="btn btn-success btn-block mt-3" name="placeord">Proceed to Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>