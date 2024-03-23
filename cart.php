<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <?php
    include_once 'navbar.php';
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $regid = $_SESSION['regid'];
    $getcart = mysqli_query($con, "SELECT * FROM cart WHERE regid=$regid");
    $tot = 0;
    ?>
    <?php
    if (isset($_REQUEST["btndel"])) {
        $cartid = $_REQUEST["btndel"];
        mysqli_query($con, "DELETE FROM cart WHERE cartid='$cartid'");
        header('refresh:0');
    }

    if (isset($_REQUEST["btnupd"])) {
        $cartid = $_REQUEST["btnupd"];
        $qty = $_REQUEST["qty_" . $cartid];
        $getCartInfo = mysqli_query($con, "SELECT * FROM cart WHERE cartid='$cartid'");
        $cartInfo = mysqli_fetch_assoc($getCartInfo);
        $prdid = $cartInfo['prdid'];
        $getProductInfo = mysqli_query($con, "SELECT stock FROM product WHERE prdid='$prdid'");
        $productInfo = mysqli_fetch_assoc($getProductInfo);
        $availableStock = $productInfo['stock'];

        if ($qty > $availableStock) {
            echo "<script>alert('Maximum available quantity for this product is $availableStock');</script>";
        } else {
            // Update cart if the entered quantity is within the available stock
            mysqli_query($con, "UPDATE cart SET quantity='$qty' WHERE cartid='$cartid'");
            header('refresh:0');
        }
    }

    if (isset($_REQUEST["btnord"])) {
        if ($_SESSION['total'] == 0) {
        } else {
            $_SESSION['order'] = $_REQUEST["btnord"];
            header('location:order.php');
        }
    }
    ?>
    <link rel="stylesheet" href="./css/cart.css">
</head>

<body>
    <form method='post'>
        <div class="container">
            <h2>Your Shopping Cart</h2>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($getcart)) {
                        $prdid = $row["prdid"];
                        $getprd = mysqli_query($con, "select * from product where prdid=$prdid");
                        while ($prow = mysqli_fetch_array($getprd)) {
                            $tot = $tot + $prow['prdpri'] * $row['quantity'];
                            echo "<tr>
                                <td><img src='./medimage/" . $prow['prdimg'] . "' alt='Card 1 Image' width='35%'  height='100px'></td>
                                <td>" . $prow['prdnm'] . "</td>
                                <td><input type='text' class='form-control w-25' value='" . $row['quantity'] . "' name='qty_" . $row['cartid'] . "'></td>
                                <td><button type='submit' class='btn btn-success' value=" . $row['cartid'] . " name='btnupd'>Update</button></td>
                                <td><button type='submit' class='btn btn-danger' value=" . $row['cartid'] . " name='btndel'>Delete</button></td>
                                <td>" . $prow['prdpri'] * $row['quantity']  . "</td>
                                </tr>";
                        }
                    }

                    ?>
                    <tr class="total table-info">
                        <td colspan="5">Total Price : </td>
                        <td>
                            <?php
                            echo $tot;
                            $_SESSION['total'] = $tot;
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary checkout-btn" name="btnord" value="<?php echo $regid ?>">Place order</button>
        </div>
    </form>
</body>

</html>