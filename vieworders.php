<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <?php
    include_once 'navbar.php';
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $query = mysqli_query($con,"select * from orders where ord_status='pending'");

    if (isset($_POST['btnpres'])) {
        $_SESSION['pres']=$_REQUEST['btnpres'];
        header('location:checkpres.php');
    }

    if (isset($_POST['btnconfirm'])) {
        $order_id=$_REQUEST['btnconfirm'];
        $updstatus=mysqli_query($con,"UPDATE orders set ord_status='done' where order_id='$order_id'");
        header('refresh:0');
    }
    ?>
    <link rel="stylesheet" href="./css/vieworder.css">
    <link rel="stylesheet" href="./css/form.css">

</head>

<body>
    <form action="" method="post">

        <div class="container">
            <h2>Pending Orders</h2>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Ord. No</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Ref ID</th>
                        <th>Prescription</th>
                        <th>Status</th>
                        <th>Confirm Order</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                    $tot = 0;
                    while ($rw = mysqli_fetch_array($query)) {
                        $getuser = mysqli_query($con, "SELECT * FROM registration  WHERE regid='$rw[customer_id]'");
                        while ($row = mysqli_fetch_array($getuser)) {
                            $pay=mysqli_query($con,"SELECT * FROM payment WHERE order_id='$rw[order_id]'");
                            while ($payrow=mysqli_fetch_array($pay)) {
                                echo "<tr>
                                <td> ". $rw['order_id'] ." </td>
                            <td> ". $rw['order_date'] ." </td>
                            <td> ". $row['fullnm'] ." </td>
                            <td> ". $row['email'] ." </td>
                            <td> ". $rw['total_amount']  ." </td>
                            <td> ". $payrow['transcode']  ." </td>
                            <td><button type='submit' name='btnpres' value=".$rw['order_id']." class='btn btn-primary'>Check Prescription</button></td>
                            <td> ". $rw['ord_status']  ." </td>
                            <td><button type='submit' name='btnconfirm' value=".$rw['order_id']." class='btn btn-success'>Dispatch order</button></td>
                            </tr>";
                        }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script src="./js/nav.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </form>

</body>

</html>