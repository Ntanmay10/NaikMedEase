<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <?php include_once 'navbar.php' ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $customer_id = $_SESSION['order'];
    $total_amount = $_SESSION['total'];
    $order_date = date("d.m.Y");
    if (isset($_POST["placeord"])) {
        $filename = $_FILES["presimg"]["name"];
        $filetype = $_FILES["presimg"]["type"];
        $filetmpname = $_FILES["presimg"]["tmp_name"];
        $addrs=$_REQUEST['address'];
        $uploadDir = "presimage/";
        $uploadPath = $uploadDir . $filename;
        move_uploaded_file($filetmpname, $uploadPath);
        $insert_order_query = mysqli_query($con, "INSERT INTO orders (customer_id, order_date, total_amount,addrs) VALUES ('$customer_id', '$order_date', '$total_amount','$addrs')");
        if ($insert_order_query) {
            // Insert order details into order_details table
            $order_id = mysqli_insert_id($con);
            $insert_pres = mysqli_query($con, "INSERT INTO prescription (regid, order_id, preimg) VALUES ('$customer_id', '$order_id', '$filename')");
            $getcartdata = mysqli_query($con, "SELECT * FROM cart WHERE regid='$customer_id'");
            while ($row = mysqli_fetch_array($getcartdata)) {
                $prdid = $row['prdid'];
                $qty = $row['quantity'];
                $getprdpri = mysqli_query($con, "select prdpri from product where prdid='$prdid'");
                $rowpri = mysqli_fetch_assoc($getprdpri);
                $price = $rowpri['prdpri'];
                $insert_order_detail_query = mysqli_query($con, "INSERT INTO order_details (order_id,product_id, quantity, price) VALUES ('$order_id','$prdid', '$qty', '$price')");
                if ($insert_order_detail_query) {
                    // Remove product from cart after placing order
                    $delcart = mysqli_query($con, "DELETE from CART where prdid='$prdid' and regid='$customer_id'");
                }
            }
            // Redirect to payment page with the order ID
            $_SESSION['orderID'] = $order_id;
            header("location: payment.php");
        }
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
                        $getcartdata = mysqli_query($con, "SELECT * FROM CART WHERE regid='$customer_id'");
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
                                <td><?php echo $total_amount ?>&#8377;</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>GST 18%</td>
                                <td><?php
                                    $taxpay = $total_amount * 0.18;
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
                                    $aftergst = $total_amount + $taxpay;
                                    $disc = $aftergst * 0.15;
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
                        $net_total = $aftergst -  $disc;
                        echo floor($net_total) . "&#8377";
                        $_SESSION['reciv'] = floor($net_total);
                        ?>
                    </h3>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Enter your address" required></textarea>
                        </div>
                        <div>
                            <label for="pres">Prescription Image:</label>
                            <input type="file" name="presimg" id="pres" class="form-control" required>
                        </div>
                        <button class="btn btn-success btn-block mt-3" name="placeord">Proceed to Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>