<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <?php include_once 'navbar.php'; ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "naikmedease");
    $qry = mysqli_query($con, "select * from contact");
    ?>
    <link rel="stylesheet" href="./css/Admin.css">
</head>

<body>
    <div class="container">
        <h2>Contact to be made</h2>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Query</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                while ($row = mysqli_fetch_assoc($qry)) {
                    echo "<tr>
                        <td>" . $num . " 
                        <td>" . $row['cntname'] . " 
                        <td>" . $row['cntemail'] . " 
                        <td>" . $row['cntdesc'] . " 
                        </tr>
                        ";
                    $num++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>