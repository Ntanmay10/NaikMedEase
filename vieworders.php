<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <?php
    include_once 'navbar.php';
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $getord = mysqli_query($con, "SELECT * FROM orders");
    if (isset($_POST['btnfilter'])) {
        $sdate = $_POST['sdate'];
        echo $sdate;
        $edate = $_POST['edate'];
        $query = "SELECT * from orders where order_date >= '$sdate' and order_date <= '$edate'";
        $filterrec = mysqli_query($con, $query);
        // header('refresh:0');
    } else {
        $query = "select * from orders";
        $filterrec = mysqli_query($con, $query);
        // header('refresh:0');
    }

    if (isset($_POST['btnall'])) {
        $query = "select * from orders";
        $filterrec = mysqli_query($con, $query);
        // header('refresh:0');
    }
    ?>
    <link rel="stylesheet" href="./css/vieworder.css">
    <link rel="stylesheet" href="./css/form.css">

</head>

<body>
    <form action="" method="post">
        <div class="box">
            <nav>
                <div class="lbl">Search</div>
                <div class="input-group ml-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input type="text" class="form-control w-25" id="myInput" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </nav>
        </div>
        </div>
        <div class="box2">
            <div class="top">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" name="sdate" value="">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="edate" value="">
                </div>
            </div>
            <div class="bott">
                <div class="form-group middle3">
                    <label>&nbsp; </label>
                    <input type="submit" class="btn btn-outline-warning" name="btnfilter" value="Filter">
                    <label>&nbsp; </label>
                    <input type="submit" class="btn btn-outline-warning" name="btnall" value="All">
                </div>
            </div>
        </div>

        <div class="container">
            <h2>Orders</h2>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Reg. No</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Ref ID</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                    $tot = 0;
                    while ($rw = mysqli_fetch_array($filterrec)) {
                        $getuser = mysqli_query($con, "SELECT * FROM registration  WHERE regid='$rw[customer_id]'");
                        while ($row = mysqli_fetch_array($getuser)) {
                            $pay=mysqli_query($con,"SELECT * FROM payment WHERE order_id='$rw[order_id]'");
                            while ($payrow=mysqli_fetch_array($pay)) {
                                
                                echo ('<tr>');
                                echo ('<td>' . $rw['customer_id'] . '</td>');
                            echo ('<td>' . $rw['order_date'] . '</td>');
                            echo ('<td>' . $row['fullnm'] . '</td>');
                            echo ('<td>' . $row['email'] . '</td>');
                            echo ('<td>' . $rw['total_amount']  . '</td>');
                            echo ('<td>' . $payrow['transcode']  . '</td>');
                            echo ('</tr>');
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