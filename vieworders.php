<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User feedback</title>
    <?php include_once 'navbar.php' ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    if (isset($_POST['btnfilter'])) {
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $query = "select * from ordertab where orddate>='$sdate' and orddate<='$edate'";
        $filterrec = mysqli_query($con, $query);
        // header('refresh:0');
    } else {
        $query = "select * from ordertab";
        $filterrec = mysqli_query($con, $query);
        // header('refresh:0');
    }

    if (isset($_POST['btnall'])) {
        $query = "select * from ordertab";
        $filterrec = mysqli_query($con, $query);
        // header('refresh:0');
    }
    ?>
    <style>
        h2 {
            text-align: center;
        }

        table {
            text-align: center;
        }

        .middle {
            margin-left: 36%;
            margin-top: 1%;
        }

        .middle2 {
            margin-left: 37%;
            margin-top: 1%;
        }

        .middle3 {
            margin-left: 7%;
            margin-top: 1%;
        }
        .info{
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <form action="" method="post">
        <nav class="w-25 middle">
            <div class="input-group ml-5">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" id="myInput" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </nav>
        <div class="container middle2">
            <div class="form-group w-25">
                <label>Start Date</label>
                <input type="date" class="form-control" name="sdate" value="">
            </div>
            <div class="form-group w-25">
                <label>End Date</label>
                <input type="date" class="form-control" name="edate" value="">
            </div>
            <div class="form-group middle3">
                <label>&nbsp; </label>
                <input type="submit" class="btn btn-outline-warning" name="btnfilter" value="Filter">
                <label>&nbsp; </label>
                <input type="submit" class="btn btn-outline-warning" name="btnall" value="All">
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
                        <th>Product</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                    $tot=0;
                    while ($rw = mysqli_fetch_array($filterrec)) {
                        $getprd = mysqli_query($con, "SELECT * FROM product WHERE prdid='$rw[prdid]'");
                        while ($rowprd = mysqli_fetch_array($getprd)) {
                            $getuser = mysqli_query($con, "SELECT * FROM registration  WHERE regid='$rw[regid]'");
                            while ($row = mysqli_fetch_array($getuser)) {
                                $tot=$tot+($rw['qty'] * $rowprd['prdpri'] );
                                echo ('<tr>');
                                echo ('<td>' . $rw['regid'] . '</td>');
                                echo ('<td>' . $rw['orddate'] . '</td>');
                                echo ('<td>' . $row['fullnm'] . '</td>');
                                echo ('<td>' . $row['email'] . '</td>');
                                echo ('<td>' . $rowprd['prdnm'] . '</td>');
                                echo ('<td>' . $rw['qty'] * $rowprd['prdpri'] . '</td>');
                                echo ('</tr>');
                            }
                        }
                    }
                    ?>
                    <tr>
                        <td class="infomid">Final</td>
                        <td colspan="4"></td>
                        <td  class="infomid"><?php echo $tot ?></td>
                    </tr>
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