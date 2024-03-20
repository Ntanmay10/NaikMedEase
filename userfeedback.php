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
        table{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Feedbacks</h2>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $feedqry = mysqli_query($con, "select * from feedback");
                $num = 1;
                while ($rowfeed = mysqli_fetch_assoc($feedqry)) {
                    echo "<tr>
                    <td>" . $num . " 
                    <td>" . $rowfeed['feedname'] . " 
                    <td>" . $rowfeed['feedemail'] . " 
                    <td>" . $rowfeed['feeddesc'] . " 
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