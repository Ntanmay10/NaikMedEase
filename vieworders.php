<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User feedback</title>
    <?php include_once 'navbar.php' ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease"); ?>
    <style>
        h2 {
            text-align: center;
        }

        table {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Orders</h2>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Sr. No</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $feedqry = mysqli_query($con, "select * from ordertab");
                $num = 1;
                while ($rowfeed = mysqli_fetch_assoc($feedqry)) {
                    $getuser=mysqli_query($con,"SELECT * FROM registration  WHERE regid='$rowfeed[regid]' ");
                    while ($row=mysqli_fetch_array($getuser)) {
                        echo "<tr>
                        <td>" . $num . " 
                        <td>".$rowfeed['orddate']."
                        <td> ".$row['fullnm']."
                        <td> ".$row['email']."
                        </tr>
                        ";
                    }
                    $num++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>