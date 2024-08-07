<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Orders</title>
    <?php
    include_once 'navbar.php';
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    if (isset($_POST['btnfilter'])) {
        $sdate = $_POST['sdate'];
        $new_start_date = date("d.m.Y", strtotime($sdate));
        $edate = $_POST['edate'];
        $new_end_date = date("d.m.Y", strtotime($edate));
        $query = "SELECT * from orders where order_date >= '$new_start_date' and order_date <= '$new_end_date' and ord_status!='pending'";
        $filterrec = mysqli_query($con, $query);
    } else {
        $query = "SELECT * from orders where ord_status!='pending'";
        $filterrec = mysqli_query($con, $query);
    }

    if (isset($_POST['btnall'])) {
        $query = "SELECT * from orders where ord_status!='pending'";
        $filterrec = mysqli_query($con, $query);
    }

    if (isset($_POST['btnpres'])) {
        $_SESSION['pres'] = $_REQUEST['btnpres'];
        header('location:checkpres.php');
    }

    if (isset($_POST['btnprod'])) {
        $_SESSION['order_id'] = $_REQUEST['btnprod'];
        header('location:checkprod.php');
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
                    <input type="date" class="form-control" name="sdate">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="edate">
                </div>
            </div>
            <div class="bott">
                <div class="form-group middle3">
                    <label>&nbsp; </label>
                    <button type="submit" class="btn btn-outline-warning" name="btnfilter">Filter</button>
                    <label>&nbsp; </label>
                    <button type="submit" class="btn btn-outline-warning" name="btnall">All</button>
                </div>
            </div>
        </div>

        <div class="container">
            <h2>Confirmed Orders</h2>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Reg. No</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Addess</th>
                        <th>Ref ID</th>
                        <th>Status</th>
                        <th>Products</th>
                        <th>Prescription</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                    $tot = 1;
                    while ($rw = mysqli_fetch_array($filterrec)) {
                        $getuser = mysqli_query($con, "SELECT * FROM registration  WHERE regid='$rw[customer_id]'");
                        while ($row = mysqli_fetch_array($getuser)) {
                            $pay = mysqli_query($con, "SELECT * FROM payment WHERE order_id='$rw[order_id]'");
                            while ($payrow = mysqli_fetch_array($pay)) {
                                echo "<tr>
                                <td> $tot </td>
                            <td> " . $rw['order_date'] . " </td>
                            <td> " . $row['fullnm'] . " </td>
                            <td> " . $row['email'] . " </td>
                            <td> " . $rw['total_amount']  . " </td>
                            <td> " . $rw['addrs']  . " </td>
                            <td> " . $payrow['transcode']  . " </td>
                            <td> " . $rw['ord_status']  . " </td>
                            <td><button type='submit' name='btnprod' value=" . $rw['order_id'] . " class='btn btn-primary'>View</button></td>
                            <td><button type='submit' name='btnpres' value=" . $rw['order_id'] . " class='btn btn-primary'>Check</button></td>
                            </tr>";
                            }
                        }
                        $tot++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
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

</body>

</html>