<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <?php include_once 'navbar.php' ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $prdid = $_SESSION['prdid'];
    $getprd = mysqli_query($con, "select * from product where prdid= '$prdid' ");
    ?>
    <?php
    function getdata()
    {
        $con = mysqli_connect("localhost", "root", "", "naikmedease");
        $prdid = $_SESSION['prdid'];
        $res = mysqli_query($con, "SELECT * FROM `product` WHERE `prdid`='$prdid'");
        $abc = mysqli_fetch_assoc($res);
        $GLOBALS['prdpri'] = $abc['prdpri'];
    }

    $regid = $_SESSION['regid'];
    $orddate = date("d.m.Y");
    $prdid = $_SESSION['prdid'];
    $priceqry = mysqli_query($con, "select prdpri from product where prdid='$prdid'");
    $rowp = mysqli_fetch_array($priceqry);
    $price = $rowp['prdpri'];
    $qty = 1;
    if (isset($_POST["placeord"])) {
        $filename = $_FILES["presimg"]["name"];
        $filetype = $_FILES["presimg"]["type"];
        $filetmpname = $_FILES["presimg"]["tmp_name"];
        $addrs = $_REQUEST['address'];
        $uploadDir = "presimage/";
        $uploadPath = $uploadDir . $filename;
        move_uploaded_file($filetmpname, $uploadPath);
        $insert_order_query = mysqli_query($con, "INSERT INTO orders (customer_id, order_date, total_amount,addrs) VALUES ('$regid', '$orddate', '$price','$addrs')");
        if ($insert_order_query) {
            $order_id = mysqli_insert_id($con);
            $insert_order_detail_query = mysqli_query($con, "INSERT INTO order_details (order_id,product_id, quantity, price) VALUES ('$order_id','$prdid', '$qty', '$price')");
            $insert_pres = mysqli_query($con, "INSERT INTO prescription (regid, order_id, preimg) VALUES ('$regid', '$order_id', '$filename')");
            // Subtract ordered quantity from available quantity
            mysqli_query($con, "UPDATE product SET stock=stock-$qty WHERE prdid='$prdid'");
        }
        // Redirect to payment page with the order ID
        $_SESSION['orderID'] = $order_id;
        header("location: payment.php");
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
                                <td> <?php
                                        getdata();
                                        echo $prdpri;
                                        ?>&#8377;
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>GST 18%</td>
                                <td>
                                    <?php
                                    getdata();
                                    $gst = $prdpri * 0.18;
                                    echo $gst;
                                    ?>
                                    &#8377;
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Disc 15%</td>
                                <td>
                                    <?php
                                    getdata();
                                    $discpri = ($prdpri + $gst) * 0.15;
                                    echo $discpri;
                                    ?>
                                    &#8377;
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h3 class="text-center">Total:
                        <?php
                        getdata();
                        $finalpay = $prdpri + $gst - $discpri;
                        echo floor($finalpay);
                        $_SESSION['reciv'] = floor($finalpay);
                        ?>&#8377;
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