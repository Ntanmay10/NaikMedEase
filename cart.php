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
    ?>
    <link rel="stylesheet" href="./css/cart.css">
</head>

<body>
    <div class="container">
        <h2>Your Shopping Cart</h2>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Product</th>
                    <th>Name</th>
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
                        $tot = $tot + $prow['prdpri'];
                        echo "<tr>
                        <td><img src='./medimage/" . $prow['prdimg'] . "' alt='Card 1 Image' width='35%'  height='100px'>
                        <td>" . $prow['prdnm'] . " 
                        <form method='post'>
                        <td><button class='btn btn-danger' value=" . $row['cartid'] . " name='btndel'>Remove</button>
                        </form>
                        <td>" . $prow['prdpri'] . " 
                        </tr>
                        ";
                    }
                }
                ?>
                <tr class="total table-info">
                    <td colspan="3">Total Price : </td>
                    <td><?php echo $tot ?></td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-primary checkout-btn">Proceed to Checkout</button>
    </div>
</body>

</html>